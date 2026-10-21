<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $provider
 * @property string $name
 * @property string|null $instructions
 * @property string|null $image_path
 * @property bool $requires_proof
 * @property bool $is_active
 * @property bool $is_available_online
 */
class PaymentMethod extends Model
{
    protected $guarded = [];

    public function canOmitPosProof(): bool
    {
        return $this->provider === 'manual' && in_array($this->code, ['yape', 'transfer', 'bank_transfer'], true);
    }

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'requires_proof' => 'boolean', 'is_available_online' => 'boolean'];
    }
}
