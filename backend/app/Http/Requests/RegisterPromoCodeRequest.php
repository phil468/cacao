<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPromoCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $code = $this->input('code', '');
        $email = $this->input('email', '');
        $this->merge(['code' => is_string($code) ? strtoupper(trim($code)) : $code, 'email' => is_string($email) ? mb_strtolower(trim($email)) : $email]);
    }

    /** @return array<string, list<string>> */
    public function rules(): array
    {
        $rules = [
            'code' => ['required', 'string', 'regex:/^[ABCDEFGHJKMNPQRSTUVWXYZ23456789]{6}$/'],
            'website' => ['nullable', 'string', 'max:0'],
        ];
        if (! $this->session()->has('promotion.participant_id')) {
            $rules += ['full_name' => ['required', 'string', 'max:120'], 'email' => ['required', 'email', 'max:255'],
                'phone' => ['required', 'string', 'regex:/^\+?[0-9 ()-]{7,30}$/'],
                'terms_accepted' => ['accepted'], 'marketing_consent' => ['sometimes', 'boolean']];
        }

        return $rules;
    }

    public function messages(): array
    {
        return ['code.required' => 'Ingresa tu código.', 'code.regex' => 'El código ingresado no es válido. Revisa los caracteres e inténtalo nuevamente.',
            'full_name.required' => 'Ingresa tu nombre completo.', 'full_name.max' => 'El nombre debe tener como máximo 120 caracteres.',
            'email.required' => 'Ingresa tu correo electrónico.', 'email.email' => 'Ingresa un correo electrónico válido.',
            'phone.required' => 'Ingresa tu celular.', 'phone.regex' => 'Ingresa un celular válido.',
            'terms_accepted.accepted' => 'Debes aceptar los Términos y Condiciones para participar.', 'website.max' => 'No se pudo procesar el registro.',
            'string' => 'Ingresa un texto válido.', 'max' => 'El campo supera la longitud permitida.', 'boolean' => 'Selecciona una opción válida.'];
    }
}
