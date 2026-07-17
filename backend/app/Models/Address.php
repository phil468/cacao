<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property string $recipient_name
 * @property string $phone
 * @property string $line_one
 * @property string|null $line_two
 * @property string $district
 * @property string $province
 * @property string $department
 * @property string|null $reference
 * @property bool $is_default
 */
class Address extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return ['is_default' => 'boolean'];
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
