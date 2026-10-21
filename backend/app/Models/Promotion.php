<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $minimum_amount
 * @property int $amount_per_code
 * @property bool $is_active
 * @property bool $legal_reviewed
 * @property bool $retention_hold
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 * @property Carbon|null $draw_at
 */
class Promotion extends Model
{
    protected $guarded = [];

    protected static function booted(): void
    {
        static::saving(function (Promotion $promotion): void {
            if ($promotion->amount_per_code < 1 || $promotion->minimum_amount < 1) {
                throw ValidationException::withMessages(['amount_per_code' => 'Los importes deben ser mayores que cero.']);
            }
            if ($promotion->is_active) {
                if (! $promotion->legal_reviewed || ! $promotion->starts_at || ! $promotion->ends_at || ! $promotion->draw_at
                    || $promotion->starts_at->gte($promotion->ends_at) || $promotion->draw_at->lt($promotion->ends_at)
                    || blank($promotion->terms_content) || blank($promotion->privacy_content)) {
                    throw ValidationException::withMessages(['is_active' => 'Completa las fechas y los textos legales revisados antes de activar la campaña.']);
                }
                foreach (['terms_content', 'privacy_content'] as $field) {
                    if (preg_match('/\[\s*PENDIENTE\b[^\]]*\]/iu', (string) $promotion->getAttribute($field)) === 1) {
                        throw ValidationException::withMessages([$field => 'Reemplaza los marcadores [PENDIENTE…] por el contenido definitivo antes de activar la campaña.']);
                    }
                }
                if (static::where('is_active', true)->when($promotion->exists, fn ($query) => $query->whereKeyNot($promotion->id))->exists()) {
                    throw ValidationException::withMessages(['is_active' => 'Desactiva la otra campaña antes de activar esta.']);
                }
            }
        });
    }

    protected function casts(): array
    {
        return ['retention_hold' => 'boolean', 'starts_at' => 'datetime', 'ends_at' => 'datetime', 'draw_at' => 'datetime', 'is_active' => 'boolean', 'legal_reviewed' => 'boolean', 'minimum_amount' => 'integer', 'amount_per_code' => 'integer'];
    }

    public function acceptsRegistrations(): bool
    {
        return $this->is_active && $this->legal_reviewed && $this->starts_at !== null && $this->ends_at !== null
            && $this->draw_at !== null && now()->betweenIncluded($this->starts_at, $this->ends_at);
    }

    /** @return HasMany<PromoCode, $this> */
    public function codes(): HasMany
    {
        return $this->hasMany(PromoCode::class);
    }

    /** @return HasMany<PromoParticipant, $this> */
    public function participants(): HasMany
    {
        return $this->hasMany(PromoParticipant::class);
    }

    /** @return HasMany<PromoCodeBatch, $this> */
    public function batches(): HasMany
    {
        return $this->hasMany(PromoCodeBatch::class);
    }
}
