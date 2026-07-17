<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use App\Support\IcaDistricts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorefrontCheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'recipient_name' => ['required', 'string', 'max:120'], 'phone' => ['required', 'string', 'max:30'],
            'line_one' => ['required', 'string', 'max:255'], 'reference' => ['nullable', 'string', 'max:500'],
            'district' => ['required', Rule::in(IcaDistricts::all())], 'province' => ['required', 'string', 'max:100'], 'department' => ['required', 'string', 'max:100'],
            'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
            'payment_proof' => [Rule::requiredIf(fn (): bool => PaymentMethod::whereKey($this->integer('payment_method_id'))->where('requires_proof', true)->exists()), 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'whatsapp_updates_opt_in' => ['nullable', 'boolean'],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return ['payment_proof.required' => 'Debes adjuntar una constancia de pago.', 'payment_proof.mimes' => 'La constancia debe ser JPG, PNG o PDF.', 'payment_proof.max' => 'La constancia no debe superar los 5 MB.'];
    }
}
