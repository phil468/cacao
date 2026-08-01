<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

it('publishes local SEO routes and product variant structured data', function () {
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates', 'is_active' => true]);
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Chocolate 70%',
        'slug' => 'chocolate-70',
        'short_description' => 'Chocolate peruano',
        'is_active' => true,
    ]);
    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Café',
        'sku' => 'CH70-CAFE',
        'cacao_percentage' => 70,
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 2,
        'low_stock_threshold' => 2,
        'is_active' => true,
    ]);

    $this->get('/chocolates-en-ica')
        ->assertOk()
        ->assertSee('Chocolates en Ica');

    $this->get('/producto/chocolate-70')
        ->assertOk()
        ->assertSee('"@type":"ProductGroup"', false)
        ->assertSee('"sku":"CH70-CAFE"', false)
        ->assertSee('"priceCurrency":"PEN"', false);

    $this->get('/sitemap.xml')->assertOk()->assertSee('/chocolates-en-ica', false)->assertSee('<lastmod>', false);
    $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /checkout');
});

it('captures UTM attribution in the session', function () {
    $this->get('/?utm_source=instagram&utm_medium=social&utm_campaign=ica_launch')->assertOk();

    expect(session('marketing_attribution'))->toMatchArray([
        'utm_source' => 'instagram',
        'utm_medium' => 'social',
        'utm_campaign' => 'ica_launch',
        'landing_path' => '/',
    ]);
});

it('publishes commercial metadata and keeps filtered catalog pages out of the index', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('<title>Chocolates peruanos en Ica | Cacao del Perú</title>', false)
        ->assertSee('<h1>Chocolate, grageas y cacao para regalar o disfrutar</h1>', false)
        ->assertSee('"@type":"WebSite"', false);

    $this->get('/catalogo')
        ->assertOk()
        ->assertSee('<meta name="robots" content="index,follow,max-image-preview:large">', false)
        ->assertSee('<link rel="canonical" href="'.route('catalog').'">', false);

    $this->get('/catalogo?q=chocolate')
        ->assertOk()
        ->assertSee('<meta name="robots" content="noindex,follow,max-image-preview:large">', false)
        ->assertSee('<link rel="canonical" href="'.route('catalog').'">', false);

});
