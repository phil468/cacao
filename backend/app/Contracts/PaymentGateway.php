<?php

namespace App\Contracts;

use App\Models\Order;
use App\Models\PaymentMethod;

interface PaymentGateway
{
    public function createPayment(Order $order, PaymentMethod $method, ?string $proofPath = null): PaymentResult;
}
