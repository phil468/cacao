<?php

use App\Models\Category;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\DataTransfer\ReferenceDataTransfer;
use Illuminate\Support\Facades\File;

it('exports only reference data and excludes transactional records', function () {
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70']);
    $variant = ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Café',
        'sku' => 'CH70-CAFE',
        'cacao_percentage' => 70,
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 9,
    ]);
    InventoryMovement::create([
        'product_variant_id' => $variant->id,
        'type' => 'opening',
        'quantity_delta' => 9,
        'balance_after' => 9,
        'reason' => 'Initial stock',
    ]);

    $directory = sys_get_temp_dir().DIRECTORY_SEPARATOR.'cacao-reference-export';
    $result = app(ReferenceDataTransfer::class)->export($directory);
    $payload = json_decode(File::get($directory.'/reference-data.json'), true, flags: JSON_THROW_ON_ERROR);

    expect($result['includes_stock'])->toBeFalse()
        ->and($payload['data'])->toHaveKeys(['categories', 'products', 'product_variants'])
        ->and($payload['data'])->not->toHaveKeys(['orders', 'inventory_movements', 'users'])
        ->and($payload['data']['product_variants'][0])->not->toHaveKey('stock')
        ->and($payload['excluded_data'])->toContain('orders', 'inventory_movements');

    File::deleteDirectory($directory);
});

it('imports reference data by stable business keys without replacing stock by default', function () {
    $category = Category::create(['name' => 'Old category', 'slug' => 'chocolates']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Old product', 'slug' => 'chocolate-70']);
    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Old variant',
        'sku' => 'CH70-CAFE',
        'weight_grams' => 45,
        'price_amount' => 1000,
        'stock' => 3,
    ]);

    $directory = sys_get_temp_dir().DIRECTORY_SEPARATOR.'cacao-reference-import';
    File::ensureDirectoryExists($directory);
    File::put($directory.'/reference-data.json', json_encode([
        'format_version' => 1,
        'generated_at' => now()->toIso8601String(),
        'source_environment' => 'testing',
        'includes_stock' => false,
        'excluded_data' => ['orders', 'inventory_movements'],
        'data' => [
            'categories' => [[
                'id' => 100,
                'parent_id' => null,
                'name' => 'Chocolates',
                'slug' => 'chocolates',
                'description' => null,
                'is_active' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]],
            'products' => [[
                'id' => 200,
                'category_id' => 100,
                'name' => 'Chocolate 70%',
                'slug' => 'chocolate-70',
                'short_description' => null,
                'description' => null,
                'is_active' => true,
                'is_featured' => false,
                'meta_title' => null,
                'meta_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]],
            'product_variants' => [[
                'id' => 300,
                'product_id' => 200,
                'name' => 'Café',
                'sku' => 'CH70-CAFE',
                'cacao_percentage' => 70,
                'weight_grams' => 45,
                'cost_amount' => 500,
                'price_amount' => 1400,
                'promotional_price_amount' => null,
                'low_stock_threshold' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]],
        ],
    ], JSON_THROW_ON_ERROR));

    app(ReferenceDataTransfer::class)->import($directory);

    expect(Category::where('slug', 'chocolates')->value('name'))->toBe('Chocolates')
        ->and(Product::where('slug', 'chocolate-70')->value('name'))->toBe('Chocolate 70%')
        ->and(ProductVariant::where('sku', 'CH70-CAFE')->value('price_amount'))->toBe(1400)
        ->and(ProductVariant::where('sku', 'CH70-CAFE')->value('stock'))->toBe(3)
        ->and(Order::count())->toBe(0);

    File::deleteDirectory($directory);
});
