<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushCampaign extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['sent_at' => 'datetime'];
    }
}
