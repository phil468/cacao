<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** @property int $quantity */
class LocationStock extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['quantity' => 'integer'];
    }
}
