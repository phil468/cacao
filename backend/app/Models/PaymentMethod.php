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
 */
class PaymentMethod extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'requires_proof' => 'boolean'];
    }
}
