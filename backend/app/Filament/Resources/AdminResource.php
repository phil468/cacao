<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;

abstract class AdminResource extends Resource
{
    protected static ?string $viewPermission = null;

    protected static ?string $managePermission = null;

    public static function canViewAny(): bool
    {
        $user = auth()->user();

        return $user !== null && ((static::$viewPermission !== null && $user->can(static::$viewPermission)) || (static::$managePermission !== null && $user->can(static::$managePermission)));
    }

    public static function canCreate(): bool
    {
        return static::$managePermission !== null && (auth()->user()?->can(static::$managePermission) ?? false);
    }

    public static function canEdit(Model $record): bool
    {
        return static::canManage();
    }

    public static function canDelete(Model $record): bool
    {
        return static::canManage();
    }

    public static function canDeleteAny(): bool
    {
        return static::canManage();
    }

    protected static function canManage(): bool
    {
        return static::$managePermission !== null && (auth()->user()?->can(static::$managePermission) ?? false);
    }
}
