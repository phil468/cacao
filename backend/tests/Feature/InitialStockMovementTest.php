<?php

use App\Filament\Resources\ProductVariantResource\Pages\CreateProductVariant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;

uses(RefreshDatabase::class);

it('records opening stock when an administrator creates a variant', function () {
    $administrator = User::create([
        'name' => 'Inventory Administrator',
        'email' => 'inventory-admin@example.test',
        'password' => Hash::make('password'),
    ]);
    Permission::findOrCreate('catalog.manage');
    $administrator->givePermissionTo('catalog.manage');
    $product = Product::create(['name' => 'Chocolate 80%', 'slug' => 'opening-stock-product', 'is_active' => true]);

    $this->actingAs($administrator);
    Livewire::test(CreateProductVariant::class)
        ->fillForm([
            'product_id' => $product->id,
            'name' => 'Bitter',
            'sku' => 'OPENING-CH80',
            'cacao_percentage' => 80,
            'weight_grams' => 45,
            'cost_amount' => 500,
            'price_amount' => 1500,
            'stock' => 6,
            'low_stock_threshold' => 2,
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('inventory_movements', [
        'actor_id' => $administrator->id,
        'type' => 'initial_stock',
        'quantity_delta' => 6,
        'balance_after' => 6,
    ]);
});
