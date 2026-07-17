<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property array<int, string> $districts
 * @property bool $is_active
 */
class DeliveryZone extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['districts' => 'array', 'is_active' => 'boolean'];
    }

    /** @return HasMany<DeliveryRate, $this> */
    public function rates(): HasMany
    {
        return $this->hasMany(DeliveryRate::class);
    }
}
