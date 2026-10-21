<?php

namespace App\Filament\Resources\PromoCodeResource\Pages;

use App\Filament\Resources\PromoCodeResource;
use App\Services\Promotions\ScannedPromoCode;
use Filament\Resources\Pages\ListRecords;

class ListPromoCodes extends ListRecords
{
    protected static string $resource = PromoCodeResource::class;

    protected string $view = 'filament.pages.promo-codes';

    public function searchScannedCode(string $value): void
    {
        abort_unless(PromoCodeResource::canViewAny(), 403);
        $this->tableSearch = app(ScannedPromoCode::class)->parse($value);
        $this->resetPage();
    }
}
