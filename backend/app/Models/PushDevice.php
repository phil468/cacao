<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PushDevice extends Model
{
    protected $fillable = ['user_id', 'token', 'platform', 'order_updates_enabled', 'promotions_enabled', 'last_seen_at'];

    protected function casts(): array
    {
        return ['order_updates_enabled' => 'boolean', 'promotions_enabled' => 'boolean', 'last_seen_at' => 'datetime'];
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
