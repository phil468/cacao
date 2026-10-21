<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @property int $id
 * @property int $promotion_id
 * @property string $email
 */
class PromoParticipant extends Model
{
    protected $guarded = [];

    protected $hidden = ['ip_address', 'user_agent'];

    protected function casts(): array
    {
        return ['terms_accepted_at' => 'datetime', 'marketing_consent' => 'boolean', 'marketing_consent_at' => 'datetime'];
    }

    public function setEmailAttribute(string $value): void
    {
        $this->attributes['email'] = mb_strtolower(trim($value));
    }

    /** @return BelongsTo<Promotion, $this> */
    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }

    /** @return HasMany<PromoCode, $this> */
    public function codes(): HasMany
    {
        return $this->hasMany(PromoCode::class, 'participant_id');
    }
}
