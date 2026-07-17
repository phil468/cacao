<?php

namespace App\Services\Messaging;

use App\Contracts\SmsOrderNotifier;
use App\Models\Order;

class DisabledSmsOrderNotifier implements SmsOrderNotifier
{
    public function send(Order $order, string $event): ?string
    {
        return null;
    }
}
