<?php

namespace App\Http\Resources;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Address */
class AddressResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return $this->only(['id', 'label', 'recipient_name', 'phone', 'line_one', 'line_two', 'district', 'province', 'department', 'reference', 'is_default']);
    }
}
