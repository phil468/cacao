<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends AdminResource
{
    protected static ?string $viewPermission = 'catalog.view';

    protected static ?string $managePermission = 'catalog.manage';

    protected static ?string $model = Product::class;

    protected static ?string $modelLabel = 'producto';

    protected static ?string $pluralModelLabel = 'productos';

    public static function form(Schema $s): Schema
    {
        return $s->components([Select::make('category_id')->relationship('category', 'name')->label('Categoría'), TextInput::make('name')->label('Nombre')->required(), TextInput::make('slug')->required()->unique(ignoreRecord: true), Textarea::make('short_description')->label('Descripción breve'), Textarea::make('description')->label('Descripción'), Toggle::make('is_active')->label('Activo'), Toggle::make('is_featured')->label('Destacado')]);
    }

    public static function table(Table $t): Table
    {
        return $t->columns([TextColumn::make('name')->label('Nombre')->searchable(), TextColumn::make('category.name')->label('Categoría'), IconColumn::make('is_active')->label('Activo')->boolean(), IconColumn::make('is_featured')->label('Destacado')->boolean()])->recordActions([EditAction::make()])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => ProductResource\Pages\ListProducts::route('/'), 'create' => ProductResource\Pages\CreateProduct::route('/create'), 'edit' => ProductResource\Pages\EditProduct::route('/{record}/edit')];
    }
}
