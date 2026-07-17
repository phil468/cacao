<?php

namespace App\Contracts;

use App\Models\Order;

interface SmsOrderNotifier
{
    public function send(Order $order, string $event): ?string;
}
