<?php

use App\Filament\Resources\PointOfSaleResource\Pages\CreatePointOfSale;
use App\Models\Category;
use App\Models\InventoryLocation;
use App\Models\LocationStock;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\User;
use App\Services\CashShiftService;
use App\Services\OrderReturnService;
use App\Services\PointOfSaleService;
use App\Services\Promotions\PromotionService;
use Database\Seeders\PointOfSaleSeeder;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    Permission::firstOrCreate(['name' => 'orders.manage', 'guard_name' => 'web']);
    $this->cashier = User::create(['name' => 'Cashier', 'email' => 'cashier@example.test', 'password' => 'secretsecret', 'is_active' => true]);
    $this->cashier->givePermissionTo('orders.manage');
    $category = Category::create(['name' => 'Cacao', 'slug' => 'pos-cacao']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate', 'slug' => 'pos-chocolate']);
    $this->variant = ProductVariant::create(['product_id' => $product->id, 'name' => '100 g', 'sku' => 'POS-001', 'weight_grams' => 100, 'price_amount' => 2500, 'promotional_price_amount' => 2000, 'stock' => 5]);
    OrderStatus::create(['code' => 'delivered', 'name' => 'Entregado']);
    $this->seed(PointOfSaleSeeder::class);
    $method = PaymentMethod::where('code', 'pos_cash')->firstOrFail();
    $location = PickupLocation::create(['name' => 'MegaPlaza Ica', 'address_line' => 'Segundo piso', 'district' => 'Ica']);
    $point = InventoryLocation::create(['code' => 'pos-test', 'name' => 'MegaPlaza Ica', 'kind' => 'pos', 'pickup_location_id' => $location->id]);
    $this->pointStock = LocationStock::create(['inventory_location_id' => $point->id, 'product_variant_id' => $this->variant->id, 'quantity' => 5]);
    $this->sale = ['pos_submission_id' => (string) Str::uuid(), 'pickup_location_id' => $location->id,
        'customer_name' => 'Consumidor final', 'sale_reference' => 'B001-001', 'payment_method_id' => $method->id,
        'discount_amount' => 100, 'payment_confirmed' => true, 'items' => [['variant_id' => $this->variant->id, 'quantity' => 2]]];
    app(CashShiftService::class)->open(['submission_id' => (string) Str::uuid(), 'location_id' => $point->id, 'opening_cash' => 0], $this->cashier);
});

it('records a paid physical sale with authoritative prices and stock movements exactly once', function () {
    $service = app(PointOfSaleService::class);
    $order = $service->sell($this->sale, $this->cashier);
    expect($order->sales_channel)->toBe('pos')->and($order->user_id)->toBeNull()
        ->and($order->total_amount)->toBe(3900)->and($order->status->code)->toBe('delivered')
        ->and($order->items->first()->unit_price_amount)->toBe(2000)->and($this->pointStock->fresh()->quantity)->toBe(3)->and($this->variant->fresh()->stock)->toBe(5);
    expect($service->sell($this->sale, $this->cashier)->id)->toBe($order->id);
    $this->assertDatabaseCount('orders', 1);
    $this->assertDatabaseCount('inventory_movements', 1);
});

it('rejects insufficient stock and rolls back the whole physical sale', function () {
    $this->sale['items'][0]['quantity'] = 6;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->cashier))->toThrow(ConflictHttpException::class);
    expect(Order::count())->toBe(0)->and($this->pointStock->fresh()->quantity)->toBe(5);
});

it('requires staff permissions and explicit payment confirmation', function () {
    $this->sale['payment_confirmed'] = false;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->cashier))->toThrow(ValidationException::class);
    $this->cashier->revokePermissionTo('orders.manage');
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->cashier))->toThrow(HttpException::class);
    expect(Order::count())->toBe(0);
});

it('rejects excessive discounts duplicate lines and external gateway payments', function () {
    $invalid = $this->sale;
    $invalid['discount_amount'] = 5000;
    expect(fn () => app(PointOfSaleService::class)->sell($invalid, $this->cashier))->toThrow(ValidationException::class);
    $invalid = $this->sale;
    $invalid['items'][] = $invalid['items'][0];
    expect(fn () => app(PointOfSaleService::class)->sell($invalid, $this->cashier))->toThrow(ValidationException::class);
    PaymentMethod::where('code', 'pos_cash')->update(['provider' => 'izipay']);
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->cashier))->toThrow(ValidationException::class);
    expect(Order::count())->toBe(0)->and($this->pointStock->fresh()->quantity)->toBe(5);
});

it('supports returns of physical sales through the existing audited return flow', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->cashier);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Producto devuelto', $this->cashier);
    expect($this->pointStock->fresh()->quantity)->toBe(4)->and($this->variant->fresh()->stock)->toBe(5);
    $this->assertDatabaseCount('order_returns', 1);
});

it('does not expose cash-only methods through online commerce options', function () {
    Sanctum::actingAs($this->cashier);
    $this->getJson('/api/v1/commerce-options')->assertOk()->assertDontSee('pos_cash');
});

it('allows staff to open the physical sale form but rejects nonstaff', function () {
    Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $this->cashier->assignRole('administrator');
    $this->actingAs($this->cashier)->get('/admin/point-of-sales/create')->assertOk()->assertSee('Punto de venta');
    $this->cashier->revokePermissionTo('orders.manage');
    $this->get('/admin/point-of-sales/create')->assertForbidden();
});

it('saves a physical sale through the admin form', function () {
    Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $this->cashier->assignRole('administrator');
    $this->actingAs($this->cashier);
    Livewire::test(CreatePointOfSale::class)
        ->fillForm($this->sale)->call('create')->assertHasNoFormErrors();
    $this->assertDatabaseHas('orders', ['sales_channel' => 'pos', 'sale_reference' => 'B001-001', 'total_amount' => 3900]);
    expect($this->pointStock->fresh()->quantity)->toBe(3)->and($this->variant->fresh()->stock)->toBe(5);
});

it('links a printed code to a physical sale and keeps order limits authoritative', function () {
    $promotion = Promotion::create(['slug' => 'pos-promotion', 'name' => 'POS campaign', 'minimum_amount' => 2000, 'amount_per_code' => 2000,
        'starts_at' => now()->subDay(), 'ends_at' => now()->addDay(), 'draw_at' => now()->addDays(2), 'legal_reviewed' => true, 'terms_content' => 'Bases revisadas', 'privacy_content' => 'Política revisada', 'is_active' => true]);
    Permission::firstOrCreate(['name' => 'promotions.manage', 'guard_name' => 'web']);
    $this->cashier->givePermissionTo('promotions.manage');
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->cashier);
    $service = app(PromotionService::class);
    $batch = $service->generateBatch($promotion, 'POS-BATCH', 2, $this->cashier);
    $codes = $batch->codes()->get();
    $service->recordDelivery($codes[0], $order, $this->cashier);
    expect($codes[0]->fresh()->order_id)->toBe($order->id);
    expect(fn () => $service->recordDelivery($codes[1], $order, $this->cashier))->toThrow(ValidationException::class);
});
