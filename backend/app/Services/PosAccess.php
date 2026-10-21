<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\PickupLocation;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PosAccess
{
    public function allowed(?User $user): bool
    {
        return $user !== null && $user->is_active && ($user->can('pos.sell') || $user->can('orders.manage'));
    }

    /** @return Builder<InventoryLocation> */
    public function locations(User $user): Builder
    {
        abort_unless($this->allowed($user), 403);

        return InventoryLocation::where('kind', 'pos')->where('is_active', true)
            ->whereIn('pickup_location_id', PickupLocation::available()->select('id'))
            ->when(! $user->can('orders.manage'), fn ($query) => $query->whereHas('sellers', fn ($query) => $query->whereKey($user->id)));
    }

    public function location(User $user, int $id): InventoryLocation
    {
        return $this->locations($user)->findOrFail($id);
    }
}
