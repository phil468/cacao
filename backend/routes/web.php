<?php

use App\Http\Controllers\AccountAddressController;
use App\Http\Controllers\AccountOrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\StorefrontAuthController;
use App\Http\Controllers\StorefrontCartController;
use App\Http\Controllers\StorefrontCheckoutController;
use App\Models\Banner;
use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home', [
    'featured' => Product::where(['is_active' => true, 'is_featured' => true])->with('variants', 'images')->take(8)->get(),
    'banners' => Banner::published()->orderBy('sort_order')->orderBy('id')->get(),
    'carouselIntervalSeconds' => max(2, min(60, (int) data_get(BusinessSetting::getValue('business.storefront', []), 'carousel_interval_seconds', 7))),
]))->name('home');
Route::get('/robots.txt', fn () => response("User-agent: *\nAllow: /\nDisallow: /admin\nDisallow: /mi-cuenta\nSitemap: ".url('/sitemap.xml')."\n", 200, ['Content-Type' => 'text/plain']));
Route::get('/sitemap.xml', function () {
    $urls = collect([route('home'), route('catalog'), route('faq'), route('contact')])
        ->merge(Product::where('is_active', true)->pluck('slug')->map(fn (string $slug): string => route('product', $slug)))
        ->merge(Category::where('is_active', true)->pluck('slug')->map(fn (string $slug): string => route('category', $slug)));

    return response(view('sitemap', ['urls' => $urls])->render(), 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog');
Route::get('/categoria/{category:slug}', [CatalogController::class, 'index'])->name('category');
Route::get('/producto/{product:slug}', function (Product $product) {
    abort_unless($product->is_active, 404);

    return view('product', [
        'product' => $product->load(['variants' => fn ($query) => $query->where('is_active', true)->with('images')->orderBy('name'), 'images']),
        'relatedProducts' => Product::where('is_active', true)->whereKeyNot($product->id)->with(['category', 'variants', 'images'])->inRandomOrder()->take(4)->get(),
    ]);
})->name('product');
Route::get('/preguntas-frecuentes', fn () => view('simple', ['title' => 'Preguntas frecuentes', 'items' => Faq::where('is_active', true)->orderBy('sort_order')->get()]))->name('faq');
Route::view('/contacto', 'contact')->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.store');
Route::get('/carrito', [StorefrontCartController::class, 'index'])->name('cart');
Route::post('/carrito', [StorefrontCartController::class, 'store'])->middleware('throttle:60,1')->name('cart.store');
Route::patch('/carrito/{variant}', [StorefrontCartController::class, 'update'])->middleware('throttle:60,1')->name('cart.update');
Route::delete('/carrito/{variant}', [StorefrontCartController::class, 'destroy'])->middleware('throttle:60,1')->name('cart.destroy');
Route::middleware('guest')->group(function () {
    Route::get('/ingresar', [StorefrontAuthController::class, 'showLogin'])->name('login');
    Route::post('/ingresar', [StorefrontAuthController::class, 'login'])->middleware('throttle:auth')->name('login.store');
    Route::get('/registro', [StorefrontAuthController::class, 'showRegister'])->name('register');
    Route::post('/registro', [StorefrontAuthController::class, 'register'])->middleware('throttle:auth')->name('register.store');
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->middleware('throttle:auth')->name('auth.google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->middleware('throttle:auth')->name('auth.google.callback');
    Route::get('/recuperar-contrasena', [PasswordResetController::class, 'request'])->name('password.request');
    Route::post('/recuperar-contrasena', [PasswordResetController::class, 'email'])->middleware('throttle:auth')->name('password.email');
    Route::get('/restablecer-contrasena/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('/restablecer-contrasena', [PasswordResetController::class, 'update'])->middleware('throttle:auth')->name('password.update');
});
Route::middleware('auth')->group(function () {
    Route::post('/salir', [StorefrontAuthController::class, 'logout'])->name('logout');
    Route::get('/checkout', [StorefrontCheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [StorefrontCheckoutController::class, 'store'])->middleware('throttle:sensitive')->name('checkout.store');
    Route::post('/checkout/resumen', [StorefrontCheckoutController::class, 'quote'])->middleware('throttle:60,1')->name('checkout.quote');
    Route::get('/checkout/completado/{order}', function (Order $order) {
        abort_unless($order->user_id === auth()->id(), 403);

        return view('checkout-success', ['order' => $order->load('items', 'status', 'paymentMethod')]);
    })->name('checkout.success');
    Route::get('/mi-cuenta/pedidos', [AccountOrderController::class, 'index'])->name('account.orders.index');
    Route::get('/mi-cuenta/pedidos/{order}', [AccountOrderController::class, 'show'])->name('account.orders.show');
    Route::get('/mi-cuenta/direcciones', [AccountAddressController::class, 'index'])->name('account.addresses.index');
    Route::post('/mi-cuenta/direcciones', [AccountAddressController::class, 'store'])->name('account.addresses.store');
    Route::get('/mi-cuenta/direcciones/{address}/editar', [AccountAddressController::class, 'edit'])->name('account.addresses.edit');
    Route::put('/mi-cuenta/direcciones/{address}', [AccountAddressController::class, 'update'])->name('account.addresses.update');
    Route::delete('/mi-cuenta/direcciones/{address}', [AccountAddressController::class, 'destroy'])->name('account.addresses.destroy');
});
