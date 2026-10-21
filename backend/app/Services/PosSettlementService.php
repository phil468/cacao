<?php

namespace App\Services;

use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PosSettlementService
{
    /** @return array<string, string> */
    public static function rules(): array
    {
        return [
            'discount_type' => 'sometimes|in:amount,percentage',
            'discount_amount' => 'required_unless:discount_type,percentage|prohibited_if:discount_type,percentage|integer|min:0',
            // One unit is 0.01 percent; all calculations remain integer-only.
            'discount_percentage' => 'required_if:discount_type,percentage|prohibited_unless:discount_type,percentage|integer|min:0|max:10000',
            'payments' => 'sometimes|array|min:1|max:5',
            'payments.*.payment_method_id' => 'required|integer|distinct',
            'payments.*.amount' => 'required|integer|min:0|max:1000000000',
            'payments.*.cash_received_amount' => 'sometimes|integer|min:0|max:1000000000',
            'payments.*.change_amount' => 'prohibited',
            'payments.*.proof_path' => 'nullable|string|max:255',
            'payments.*.proof_missing' => 'sometimes|boolean',
            'payment_method_id' => 'required_without:payments|prohibits:payments|integer',
            'payment_proof_path' => 'nullable|prohibits:payments|string|max:255',
            'payment_proof_missing' => 'sometimes|prohibits:payments|boolean',
        ];
    }

    /** @param array<string, mixed> $data
     * @return array{discount: int, type: string, basis_points: int|null, payments: list<array{payment_method_id: int, amount: int, cash_received_amount: int|null, change_amount: int|null, proof_path: string|null, proof_missing: bool}>}
     */
    public function prepare(array $data, int $subtotal, User $cashier): array
    {
        $type = $data['discount_type'] ?? 'amount';
        $basisPoints = $type === 'percentage' ? (int) $data['discount_percentage'] : null;
        $discount = $basisPoints !== null ? intdiv($subtotal * $basisPoints + 5000, 10000) : (int) $data['discount_amount'];
        abort_if(! $cashier->can('orders.manage') && ($discount !== 0 || ($basisPoints ?? 0) !== 0), 403);
        if ($discount > $subtotal) {
            throw ValidationException::withMessages(['discount_amount' => 'El descuento no puede superar el subtotal.']);
        }
        $total = $subtotal - $discount;
        $payments = $data['payments'] ?? [[
            'payment_method_id' => $data['payment_method_id'], 'amount' => $total,
            'proof_path' => $data['payment_proof_path'] ?? null, 'proof_missing' => $data['payment_proof_missing'] ?? false,
        ]];
        if (array_sum(array_column($payments, 'amount')) !== $total) {
            throw ValidationException::withMessages(['payments' => 'La suma de los pagos debe coincidir exactamente con el total de la venta.']);
        }
        $result = [];
        foreach ($payments as $index => $payment) {
            $method = PaymentMethod::where('is_active', true)->where('provider', 'manual')->find($payment['payment_method_id']);
            if (! $method || ($total > 0 && $payment['amount'] <= 0) || ($total === 0 && count($payments) !== 1)) {
                throw ValidationException::withMessages(['payments' => 'Revisa los métodos y los importes: cada pago debe ser mayor que cero, salvo una venta gratuita con un solo método.']);
            }
            $received = null;
            $change = null;
            if ($method->code === 'pos_cash') {
                // Legacy clients imply exact cash. Never count tendered notes as revenue.
                $received = (int) ($payment['cash_received_amount'] ?? $payment['amount']);
                $change = $received - (int) $payment['amount'];
                if ($change < 0) {
                    throw ValidationException::withMessages(['payments.'.$index.'.cash_received_amount' => 'El efectivo recibido no puede ser menor que el importe del pago en efectivo.']);
                }
            } elseif (array_key_exists('cash_received_amount', $payment)) {
                throw ValidationException::withMessages(['payments.'.$index.'.cash_received_amount' => 'Solo el pago en efectivo admite importe recibido y vuelto.']);
            }
            $path = $payment['proof_path'] ?? null;
            $missing = (bool) ($payment['proof_missing'] ?? false);
            $field = isset($data['payments']) ? 'payments.'.$index.'.proof_path' : 'payment_proof_path';
            if ($missing && (! $method->canOmitPosProof() || ! empty($path))) {
                throw ValidationException::withMessages([isset($data['payments']) ? 'payments.'.$index.'.proof_missing' : 'payment_proof_missing' => 'Solo puedes declarar que no se tomó imagen en Yape o transferencia, sin adjuntar archivo.']);
            }
            if (($method->requires_proof || $method->canOmitPosProof()) && empty($path) && ! $missing) {
                throw ValidationException::withMessages([$field => $method->canOmitPosProof() ? 'Adjunta la constancia de pago o marca «No se tomó imagen».' : 'Adjunta la constancia de pago.']);
            }
            if (! empty($path)) {
                abort_unless(preg_match('~^payment-proofs/pos/'.$cashier->id.'/[a-zA-Z0-9]+\.(jpe?g|png|webp|pdf)$~i', $path), 403);
                if (! Storage::disk('local')->exists($path)) {
                    throw ValidationException::withMessages([$field => 'No se encontró la constancia de pago.']);
                }
            }
            $result[] = ['payment_method_id' => (int) $method->id, 'amount' => (int) $payment['amount'], 'cash_received_amount' => $received, 'change_amount' => $change, 'proof_path' => $path, 'proof_missing' => $missing];
        }

        return ['discount' => $discount, 'type' => $type, 'basis_points' => $basisPoints, 'payments' => $result];
    }
}
