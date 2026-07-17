<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

it('filters the public catalog by category cacao percentage and availability', function () {
    $category = Category::create(['name' => 'Tabletas', 'slug' => 'tabletas', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70', 'is_active' => true]);
    ProductVariant::create(['product_id' => $product->id, 'name' => 'Bitter', 'sku' => 'TEST-70', 'cacao_percentage' => 70, 'weight_grams' => 45, 'price_amount' => 1400, 'stock' => 2, 'is_active' => true]);

    $this->get('/catalogo?category=tabletas&cacao=70&availability=in_stock')
        ->assertOk()->assertSee('Chocolate 70%')->assertSee('Bitter');
    $this->get('/categoria/tabletas')->assertOk()->assertSee('Chocolate 70%');
    $this->get('/catalogo?cacao=38')->assertSessionHasErrors('cacao');
});

it('exposes production administration resources only to authorized administrators', function () {
    $this->seed(DatabaseSeeder::class);
    $admin = User::where('email', 'admin@cacaodelperu.test')->firstOrFail();

    $this->actingAs($admin)->get('/admin/business-settings')->assertOk();
    $this->actingAs($admin)->get('/admin/admin-users')->assertOk();
    $this->actingAs($admin)->get('/admin/roles')->assertOk();
    $this->actingAs($admin)->get('/admin/permissions')->assertOk();

    $customer = User::create(['name' => 'Customer', 'email' => 'customer@example.com', 'password' => 'secretsecret', 'is_active' => true]);
    $customer->assignRole(Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']));
    $this->actingAs($customer)->get('/admin')->assertForbidden();
});

it('enforces granular Filament permissions for administrative users', function () {
    $this->seed(DatabaseSeeder::class);
    $admin = User::where('email', 'admin@cacaodelperu.test')->firstOrFail();
    $role = Role::findByName('administrator');
    $role->revokePermissionTo(['orders.view', 'orders.manage']);

    $this->actingAs($admin)->get('/admin')->assertOk();
    $this->actingAs($admin)->get('/admin/orders')->assertForbidden();
});

it('allows an order manager to edit orders even though orders cannot be created in Filament', function () {
    $this->seed(DatabaseSeeder::class);
    $admin = User::where('email', 'admin@cacaodelperu.test')->firstOrFail();
    $order = Order::create([
        'number' => (string) Str::uuid(),
        'user_id' => $admin->id,
        'order_status_id' => OrderStatus::where('code', 'pending_payment')->value('id'),
        'payment_method_id' => PaymentMethod::firstOrFail()->id,
        'customer_name' => $admin->name,
        'customer_email' => $admin->email,
        'customer_phone' => $admin->phone,
        'delivery_address' => ['district' => 'Ica'],
        'subtotal_amount' => 1000,
        'discount_amount' => 0,
        'delivery_amount' => 0,
        'total_amount' => 1000,
    ]);

    $this->actingAs($admin)->get("/admin/orders/{$order->id}/edit")->assertOk();
});

it('does not reveal whether an email exists during password recovery', function () {
    Notification::fake();
    $this->post('/recuperar-contrasena', ['email' => 'unknown@example.com'])
        ->assertSessionHas('success');
});

it('uses only an explicitly selected primary product image', function () {
    $product = Product::create(['name' => 'Coffee', 'slug' => 'coffee', 'is_active' => true]);
    $secondary = ProductImage::create(['product_id' => $product->id, 'path' => 'products/secondary.webp', 'is_primary' => false, 'sort_order' => 0]);
    expect($product->fresh()->images()->where('is_primary', true)->exists())->toBeFalse();

    ProductImage::create(['product_id' => $product->id, 'path' => 'products/primary.webp', 'is_primary' => true, 'sort_order' => 10]);
    expect($secondary->fresh()->is_primary)->toBeFalse()
        ->and($product->fresh()->images()->where('is_primary', true)->count())->toBe(1);
});
