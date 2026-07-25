<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use App\Support\IcaDistricts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorefrontCheckoutRequest extends FormRequest
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
            'fulfillment_type' => ['required', Rule::in(['delivery', 'pickup'])],
            'pickup_location_id' => ['nullable', 'required_if:fulfillment_type,pickup', 'integer', 'exists:pickup_locations,id'],
            'recipient_name' => ['required', 'string', 'max:120'], 'phone' => ['required', 'string', 'max:30'],
            'line_one' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:255'], 'reference' => ['nullable', 'string', 'max:500'],
            'district' => ['nullable', 'required_if:fulfillment_type,delivery', Rule::in(IcaDistricts::all())],
            'province' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'department' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'],
            'billing_document_type' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('provider', 'izipay')->exists()), 'nullable', 'in:DNI,CE'],
            'billing_document_number' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('provider', 'izipay')->exists()), 'nullable', 'string', 'max:20'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
            'payment_proof' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('requires_proof', true)->exists()), 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'whatsapp_updates_opt_in' => ['nullable', 'boolean'],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'pickup_location_id.required_if' => 'Selecciona el local o feria donde recogerás tu pedido.',
            'billing_document_type.required' => 'Selecciona el tipo de documento para pagar con Izipay.',
            'billing_document_number.required' => 'Ingresa tu documento para pagar con Izipay.',
            'district.required_if' => 'Selecciona el distrito de entrega.',
            'payment_proof.required' => 'Debes adjuntar una constancia de pago.',
            'payment_proof.mimes' => 'La constancia debe ser JPG, PNG o PDF.',
            'payment_proof.max' => 'La constancia no debe superar los 5 MB.',
        ];
    }
}
