<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return ['items' => ['required', 'array', 'min:1', 'max:50'], 'items.*.variant_id' => ['required', 'integer', 'distinct', 'exists:product_variants,id'], 'items.*.quantity' => ['required', 'integer', 'min:1', 'max:50'], 'address' => ['required', 'array'], 'address.recipient_name' => ['required', 'string', 'max:120'], 'address.phone' => ['required', 'string', 'max:30'], 'address.line_one' => ['required', 'string', 'max:255'], 'address.district' => ['required', 'string', 'max:100'], 'address.province' => ['required', 'string', 'max:100'], 'address.department' => ['required', 'string', 'max:100'], 'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'], 'delivery_rate_id' => ['required', 'integer', 'exists:delivery_rates,id'], 'coupon_code' => ['nullable', 'string', 'max:50'], 'whatsapp_updates_opt_in' => ['nullable', 'boolean'], 'payment_proof' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('requires_proof', true)->exists()), 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120']];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return ['payment_proof.required' => 'Debes adjuntar una constancia de pago.'];
    }
}
