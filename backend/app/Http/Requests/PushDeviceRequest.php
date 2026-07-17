<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PushDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /** @return array<string, array<int, mixed>> */
    public function rules(): array
    {
        return [
            'token' => ['required', 'string', 'max:512'],
            'platform' => ['required', Rule::in(['android', 'ios'])],
            'order_updates_enabled' => ['required', 'boolean'],
            'promotions_enabled' => ['required', 'boolean'],
        ];
    }
}
