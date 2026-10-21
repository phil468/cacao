<?php

namespace App\Services\Promotions;

use Illuminate\Validation\ValidationException;

class ScannedPromoCode
{
    public function parse(string $value): string
    {
        $value = trim($value);
        if (strlen($value) <= 2048 && filter_var($value, FILTER_VALIDATE_URL)) {
            $url = parse_url($value);
            $query = [];
            parse_str($url['query'] ?? '', $query);
            if (! in_array($url['scheme'] ?? '', ['http', 'https'], true) || ($url['path'] ?? '') !== '/promo' || isset($url['user']) || isset($url['pass'])) {
                $value = '';
            } else {
                // Extract data only; scanned URLs are never opened or fetched.
                $value = is_string($query['code'] ?? null) ? $query['code'] : '';
            }
        }
        $value = strtoupper($value);
        if (! preg_match('/^[ABCDEFGHJKMNPQRSTUVWXYZ23456789]{6}$/', $value)) {
            throw ValidationException::withMessages(['scanner' => 'El QR no contiene un código válido de la promoción.']);
        }

        return $value;
    }
}
