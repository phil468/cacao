<?php

namespace App\Contracts;

readonly class PaymentResult
{
    public function __construct(public string $status, public ?string $reference = null) {}
}
