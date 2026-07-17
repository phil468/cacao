<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
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

class CategoryResource extends AdminResource
{
    protected static ?string $viewPermission = 'catalog.view';

    protected static ?string $managePermission = 'catalog.manage';

    protected static ?string $model = Category::class;

    protected static ?string $modelLabel = 'categoría';

    protected static ?string $pluralModelLabel = 'categorías';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('parent_id')->relationship('parent', 'name')->label('Categoría superior')->searchable()->preload(),
            TextInput::make('name')->label('Nombre')->required()->maxLength(255),
            TextInput::make('slug')->label('URL amigable')->required()->unique(ignoreRecord: true)->maxLength(255),
            Textarea::make('description')->label('Descripción')->columnSpanFull(),
            TextInput::make('sort_order')->label('Orden')->numeric()->default(0)->minValue(0),
            Toggle::make('is_active')->label('Activa')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nombre')->searchable()->sortable(),
            TextColumn::make('parent.name')->label('Superior')->placeholder('—'),
            TextColumn::make('products_count')->counts('products')->label('Productos'),
            IconColumn::make('is_active')->label('Activa')->boolean(),
        ])->recordActions([EditAction::make()])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListCategories::route('/'), 'create' => Pages\CreateCategory::route('/create'), 'edit' => Pages\EditCategory::route('/{record}/edit')];
    }
}
