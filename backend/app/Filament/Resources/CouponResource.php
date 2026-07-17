<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CouponResource extends AdminResource
{
    protected static ?string $viewPermission = 'catalog.view';

    protected static ?string $managePermission = 'catalog.manage';

    protected static ?string $model = Coupon::class;

    protected static ?string $modelLabel = 'cupón';

    protected static ?string $pluralModelLabel = 'cupones';

    public static function form(Schema $s): Schema
    {
        return $s->components([TextInput::make('code')->label('Código')->required()->unique(ignoreRecord: true), Select::make('type')->label('Tipo')->options(['fixed' => 'Monto fijo', 'percentage' => 'Porcentaje'])->required(), TextInput::make('value')->label('Valor')->numeric()->required()->minValue(0), TextInput::make('minimum_amount')->label('Compra mínima (céntimos)')->numeric(), TextInput::make('maximum_discount_amount')->label('Descuento máximo (céntimos)')->numeric(), TextInput::make('usage_limit')->label('Límite total de usos')->numeric(), Toggle::make('once_per_customer')->label('Un solo uso por cliente')->helperText('Cada cliente registrado podrá aplicar este cupón en un solo pedido activo. Si el pedido se cancela, podrá volver a utilizarlo.'), DateTimePicker::make('starts_at')->label('Inicio'), DateTimePicker::make('ends_at')->label('Fin'), Toggle::make('is_active')->label('Activo')]);
    }

    public static function table(Table $t): Table
    {
        return $t->columns([TextColumn::make('code')->label('Código')->searchable()->copyable(), TextColumn::make('type')->label('Tipo')->badge(), TextColumn::make('value')->label('Valor'), TextColumn::make('usage_count')->label('Usos'), TextColumn::make('usage_limit')->label('Límite')->placeholder('∞'), IconColumn::make('once_per_customer')->label('Una vez por cliente')->boolean(), IconColumn::make('is_active')->label('Activo')->boolean(), TextColumn::make('ends_at')->label('Vence')->dateTime('d/m/Y H:i')->placeholder('Sin vencimiento')])->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListCoupons::route('/'), 'create' => Pages\CreateCoupon::route('/create'), 'edit' => Pages\EditCoupon::route('/{record}/edit')];
    }
}
