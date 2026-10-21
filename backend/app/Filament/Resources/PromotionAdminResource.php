<?php

namespace App\Filament\Resources;

use BackedEnum;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

abstract class PromotionAdminResource extends AdminResource
{
    protected static ?string $viewPermission = 'promotions.view';

    protected static ?string $managePermission = 'promotions.manage';

    protected static string|UnitEnum|null $navigationGroup = 'Promoción Aniversario';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-gift';

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
