<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    protected $guarded = [];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return static::query()->where('key', $key)->value('value') ?? $default;
    }

    protected function casts(): array
    {
        return ['value' => 'array'];
    }
}
