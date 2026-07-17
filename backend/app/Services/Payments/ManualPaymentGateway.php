<?php

namespace App\Services\Payments;

use App\Contracts\PaymentGateway;
use App\Contracts\PaymentResult;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Validation\ValidationException;

class ManualPaymentGateway implements PaymentGateway
{
    public function createPayment(Order $order, PaymentMethod $method, ?string $proofPath = null): PaymentResult
    {
        if ($method->requires_proof && blank($proofPath)) {
            throw ValidationException::withMessages(['payment_proof' => 'Este método de pago requiere una constancia.']);
        }

        return new PaymentResult('pending', $proofPath);
    }
}
