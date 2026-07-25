<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
            'address' => ['required', 'array'],
            'address.recipient_name' => ['required', 'string', 'max:120'],
            'address.phone' => ['required', 'string', 'max:30'],
            'address.line_one' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:255'],
            'address.district' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'address.province' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'address.department' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'],
            'billing_document_type' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('provider', 'izipay')->exists()), 'nullable', 'in:DNI,CE'],
            'billing_document_number' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('provider', 'izipay')->exists()), 'nullable', 'string', 'max:20'],
            'delivery_rate_id' => ['nullable', 'required_if:fulfillment_type,delivery', 'integer', 'exists:delivery_rates,id'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
            'whatsapp_updates_opt_in' => ['nullable', 'boolean'],
            'payment_proof' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('requires_proof', true)->exists()), 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'payment_proof.required' => 'Debes adjuntar una constancia de pago.',
            'pickup_location_id.required_if' => 'Selecciona el local o feria donde recogerás tu pedido.',
            'address.district.required_if' => 'Selecciona tu distrito para calcular el envío.',
        ];
    }
}
