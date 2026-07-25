<?php

namespace App\Services\Payments;

use App\Jobs\SendOrderCustomerNotifications;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentTransaction;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class IzipayService
{
    /** @return array{transaction: PaymentTransaction, authorization: string, config: array<string, mixed>, public_key: string, sdk_url: string} */
    public function checkoutData(Order $order): array
    {
        $this->assertConfigured();

        $transaction = $order->paymentTransactions()->firstOrCreate(
            ['provider' => 'izipay', 'status' => 'pending'],
            [
                'transaction_id' => now()->format('YmdHis').random_int(10000, 99999),
                'amount' => $order->total_amount,
                'currency' => 'PEN',
            ],
        );

        return [
            'transaction' => $transaction,
            'authorization' => $this->sessionToken($transaction),
            'config' => $this->sdkConfig($order, $transaction),
            'public_key' => (string) config('services.izipay.public_key'),
            'sdk_url' => config('services.izipay.environment') === 'production'
                ? 'https://checkout.izipay.pe/payments/v1/js/index.js'
                : 'https://sandbox-checkout.izipay.pe/payments/v1/js/index.js',
        ];
    }

    public function validSignature(string $payload, string $signature): bool
    {
        $expected = base64_encode(hash_hmac('sha256', $payload, (string) config('services.izipay.hash_key'), true));

        return $signature !== '' && hash_equals($expected, $signature);
    }

    /** @param array<string, mixed> $notification */
    public function processNotification(array $notification): PaymentTransaction
    {
        $payload = (string) ($notification['payloadHttp'] ?? '');
        $signature = (string) ($notification['signature'] ?? '');
        $transactionId = (string) ($notification['transactionId'] ?? '');

        if (! $this->validSignature($payload, $signature)) {
            throw ValidationException::withMessages(['signature' => 'La firma de Izipay no es válida.']);
        }

        $decoded = json_decode($payload, true);
        if (! is_array($decoded) || (string) ($decoded['transactionId'] ?? '') !== $transactionId) {
            throw ValidationException::withMessages(['transactionId' => 'La transacción recibida no coincide con la firma.']);
        }

        return DB::transaction(function () use ($decoded, $notification, $transactionId): PaymentTransaction {
            $transaction = PaymentTransaction::with('order.status')->where('transaction_id', $transactionId)->lockForUpdate()->firstOrFail();
            if ($transaction->processed_at !== null) {
                return $transaction;
            }

            $providerOrder = data_get($decoded, 'response.order.0', []);
            $amount = $this->decimalToCents((string) data_get($providerOrder, 'amount', ''));
            $currency = (string) data_get($providerOrder, 'currency', '');
            $orderNumber = (string) data_get($providerOrder, 'orderNumber', '');

            if ($amount !== $transaction->amount || $currency !== $transaction->currency || $orderNumber !== $transaction->transaction_id) {
                throw ValidationException::withMessages(['payment' => 'Los datos del pago no coinciden con el pedido.']);
            }

            $approved = (string) ($decoded['code'] ?? '') === '00';
            $transaction->update([
                'status' => $approved ? 'approved' : 'failed',
                'provider_reference' => (string) data_get($providerOrder, 'uniqueId', ''),
                'response_payload' => $notification,
                'processed_at' => now(),
            ]);

            if ($approved) {
                $this->markOrderAsPaid($transaction->order);
            }

            return $transaction->refresh();
        }, 5);
    }

    private function sessionToken(PaymentTransaction $transaction): string
    {
        $response = $this->http()
            ->withHeaders(['transactionId' => $transaction->transaction_id])
            ->post((string) config('services.izipay.session_token_url'), [
                'merchantCode' => (string) config('services.izipay.merchant_code'),
                'transactionId' => $transaction->transaction_id,
            ])
            ->throw()
            ->json();

        foreach (['authorization', 'token', 'sessionToken', 'response.token', 'response.sessionToken', 'answer.sessionToken'] as $path) {
            $token = data_get($response, $path);
            if (is_string($token) && $token !== '') {
                return $token;
            }
        }

        throw new RuntimeException('Izipay no devolvió un token de sesión válido.');
    }

    private function http(): PendingRequest
    {
        $header = (string) config('services.izipay.api_key_header', 'Authorization');
        $prefix = trim((string) config('services.izipay.api_key_prefix'));
        $value = trim($prefix.' '.(string) config('services.izipay.api_key'));

        return Http::acceptJson()->asJson()->timeout(15)->retry(2, 250)->withHeaders([$header => $value]);
    }

    /** @return array<string, mixed> */
    private function sdkConfig(Order $order, PaymentTransaction $transaction): array
    {
        $names = preg_split('/\s+/', trim($order->customer_name), 2) ?: [];

        return [
            'transactionId' => $transaction->transaction_id,
            'action' => 'pay',
            'merchantCode' => (string) config('services.izipay.merchant_code'),
            'order' => [
                'orderNumber' => $transaction->transaction_id,
                'currency' => 'PEN',
                'amount' => number_format($order->total_amount / 100, 2, '.', ''),
                'processType' => 'AT',
                'merchantBuyerId' => 'customer-'.$order->user_id,
                'dateTimeTransaction' => now()->format('YmdHis'),
            ],
            'billing' => [
                'firstName' => $names[0] ?? $order->customer_name,
                'lastName' => $names[1] ?? '-',
                'email' => $order->customer_email,
                'phoneNumber' => $order->customer_phone,
                'street' => $order->fulfillment_type === 'pickup'
                    ? (string) data_get($order->pickup_location_snapshot, 'address_line')
                    : (string) data_get($order->delivery_address, 'line_one'),
                'city' => $order->fulfillment_type === 'pickup'
                    ? (string) data_get($order->pickup_location_snapshot, 'district')
                    : (string) data_get($order->delivery_address, 'district'),
                'state' => 'Ica',
                'country' => 'PE',
                'postalCode' => (string) config('services.izipay.postal_code'),
                'documentType' => $order->billing_document_type,
                'document' => $order->billing_document_number,
            ],
            'render' => ['typeForm' => 'pop-up'],
            'urlIPN' => route('izipay.webhook'),
        ];
    }

    private function markOrderAsPaid(Order $order): void
    {
        if (! in_array($order->status->code, ['pending_payment', 'payment_review'], true)) {
            return;
        }

        $target = OrderStatus::where('code', 'preparing')->firstOrFail();
        $order->update(['order_status_id' => $target->id]);
        $order->statusHistories()->create([
            'order_status_id' => $target->id,
            'note' => 'Pago confirmado automáticamente por Izipay.',
        ]);
        SendOrderCustomerNotifications::dispatch($order->id, 'order.payment.approved')->afterCommit();
    }

    private function decimalToCents(string $amount): int
    {
        if (! preg_match('/^\d+(?:\.\d{1,2})?$/', $amount)) {
            return -1;
        }

        [$whole, $decimal] = array_pad(explode('.', $amount, 2), 2, '0');

        return ((int) $whole * 100) + (int) Str::padRight($decimal, 2, '0');
    }

    private function assertConfigured(): void
    {
        if (! config('services.izipay.enabled')) {
            throw ValidationException::withMessages(['izipay' => 'Izipay aún no está habilitado.']);
        }

        foreach (['merchant_code', 'api_key', 'hash_key', 'public_key', 'session_token_url'] as $key) {
            if (blank(config("services.izipay.{$key}"))) {
                throw ValidationException::withMessages(['izipay' => 'Izipay aún no está configurado.']);
            }
        }
    }
}
