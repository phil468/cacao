<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutQuoteRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->mergeIfMissing(['fulfillment_type' => 'delivery']);
    }

    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'items' => ['required', 'array', 'min:1', 'max:50'],
            'items.*.variant_id' => ['required', 'integer', 'distinct', 'exists:product_variants,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:50'],
            'fulfillment_type' => ['required', 'in:delivery,pickup'],
            'pickup_location_id' => ['nullable', 'required_if:fulfillment_type,pickup', 'integer', 'exists:pickup_locations,id'],
            'district' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
        ];
    }
}
