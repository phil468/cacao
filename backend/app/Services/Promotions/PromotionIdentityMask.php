<?php

namespace App\Services\Promotions;

class PromotionIdentityMask
{
    /**
     * @param  array{full_name: string, email: string, phone: string}  $identity
     * @return array{full_name: string, email: string, phone: string}
     */
    public function mask(array $identity): array
    {
        $words = preg_split('/\s+/u', trim($identity['full_name']), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $name = array_map(function (string $word): string {
            $length = mb_strlen($word);
            $visible = min(2, intdiv($length, 2));

            return mb_substr($word, 0, $visible).str_repeat('*', max(1, $length - $visible));
        }, $words);
        [$local, $domain] = array_pad(explode('@', mb_strtolower(trim($identity['email'])), 2), 2, '');
        $visible = min(3, intdiv(mb_strlen($local), 2));
        $email = mb_substr($local, 0, $visible).'***@'.$domain;
        $digits = preg_replace('/\D+/', '', $identity['phone']) ?? '';

        return ['full_name' => implode(' ', $name), 'email' => $email, 'phone' => '***'.(strlen($digits) >= 7 ? substr($digits, -3) : '')];
    }
}
