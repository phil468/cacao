<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\ValidationException;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $kind
 * @property int|null $pickup_location_id
 * @property bool $is_active
 */
class InventoryLocation extends Model
{
    protected $guarded = [];

    protected static function booted(): void
    {
        static::saving(function (InventoryLocation $location): void {
            if (($location->exists && $location->isDirty(['code', 'kind', 'pickup_location_id']))
                || (! $location->exists && ($location->kind !== 'pos' || $location->code === 'central' || ! $location->pickup_location_id))
                || ($location->kind === 'central' && ! $location->is_active)) {
                throw ValidationException::withMessages(['name' => 'No se puede cambiar la identidad, tipo o punto de una ubicación existente ni desactivar el almacén central.']);
            }
        });
    }

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    /** @return BelongsToMany<User, $this> */
    public function sellers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'inventory_location_user');
    }

    /** @return BelongsTo<PickupLocation, $this> */
    public function pickupLocation(): BelongsTo
    {
        return $this->belongsTo(PickupLocation::class);
    }
}
