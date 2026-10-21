<?php

namespace App\Services\Promotions;

use App\Models\PromoCode;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Builder;

class PromotionParticipationQuery
{
    /** @return Builder<PromoCode> */
    public function forPromotion(Promotion $promotion): Builder
    {
        return PromoCode::where('promotion_id', $promotion->id)->where('status', 'registered')
            ->where('activation_mode', '!=', 'reserve')
            ->whereNotNull('participant_id')->whereNotNull('registered_at')
            ->where(function (Builder $query): void {
                $query->whereNull('batch_id')->orWhereHas('batch', fn (Builder $batch) => $batch->where('status', 'active'));
            })
            ->when($promotion->starts_at, fn (Builder $query) => $query->where('registered_at', '>=', $promotion->starts_at))
            ->when($promotion->ends_at, fn (Builder $query) => $query->where('registered_at', '<=', $promotion->ends_at));
    }
}
