<?php

namespace App\Http\Requests;

use App\Models\Address;
use App\Support\IcaDistricts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        $address = $this->route('address');

        return ! $address instanceof Address || $address->user_id === $this->user()?->id;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:80'], 'recipient_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'], 'line_one' => ['required', 'string', 'max:255'],
            'line_two' => ['nullable', 'string', 'max:255'], 'district' => ['required', Rule::in(IcaDistricts::all())],
            'province' => ['required', 'string', 'max:100'], 'department' => ['required', 'string', 'max:100'],
            'reference' => ['nullable', 'string', 'max:500'], 'is_default' => ['nullable', 'boolean'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'], 'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ];
    }
}
