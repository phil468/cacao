<?php

use App\Models\Banner;

it('uses the default hero only when there are no published banners', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('El lujo también tiene origen.')
        ->assertDontSee('data-banner-previous', false);

    Banner::create([
        'title' => 'Café peruano',
        'image_path' => 'banners/cafe.webp',
        'is_active' => true,
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('banners/cafe.webp', false)
        ->assertDontSee('El lujo también tiene origen.')
        ->assertDontSee('data-banner-previous', false);
});

it('shows carousel controls only when multiple published banners exist', function () {
    foreach (['Café peruano', 'Chocolate peruano'] as $index => $title) {
        Banner::create([
            'title' => $title,
            'image_path' => "banners/banner-{$index}.webp",
            'is_active' => true,
            'sort_order' => $index,
        ]);
    }

    $this->get('/')
        ->assertOk()
        ->assertSee('data-banner-previous', false)
        ->assertSee('data-banner-next', false)
        ->assertSee('data-banner-dot="0"', false)
        ->assertSee('data-banner-dot="1"', false)
        ->assertDontSee('El lujo también tiene origen.');
});
