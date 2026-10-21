<?php

namespace App\Filament\Widgets;

use App\Models\PromoCode;
use App\Models\PromoParticipant;
use App\Models\Promotion;
use App\Services\Promotions\PromotionParticipationQuery;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PromotionOverview extends StatsOverviewWidget
{
    public static function canView(): bool
    {
        return (auth()->user()?->can('promotions.view') ?? false) || (auth()->user()?->can('promotions.manage') ?? false);
    }

    protected function getStats(): array
    {
        $promotion = Promotion::where('is_active', true)->orderByDesc('starts_at')->first() ?? Promotion::latest('id')->first();
        if (! $promotion) {
            return [];
        }
        $codes = PromoCode::where('promotion_id', $promotion->id);
        $participants = PromoParticipant::where('promotion_id', $promotion->id);
        $total = (clone $participants)->count();
        $consent = (clone $participants)->where('marketing_consent', true)->count();
        $entries = app(PromotionParticipationQuery::class)->forPromotion($promotion);
        $today = now('America/Lima')->startOfDay()->setTimezone(config('app.timezone'));

        return [
            Stat::make('Códigos generados', (clone $codes)->count())->description($promotion->name),
            Stat::make('Códigos disponibles', (clone $codes)->where('status', 'available')->count()),
            Stat::make('Códigos registrados', (clone $codes)->where('status', 'registered')->count()),
            Stat::make('Códigos deshabilitados', (clone $codes)->where('status', 'disabled')->count()),
            Stat::make('Participantes únicos', $total), Stat::make('Participaciones totales válidas', (clone $entries)->count()),
            Stat::make('Registros de hoy', (clone $codes)->whereBetween('registered_at', [$today, $today->copy()->addDay()])->count()),
            Stat::make('Consentimiento promocional', ($total ? number_format($consent * 100 / $total, 1) : '0').'%'),
        ];
    }
}
