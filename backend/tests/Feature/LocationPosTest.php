<?php

use App\Filament\Resources\AdminUserResource\Pages\CreateAdminUser;
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
use App\Services\LocationInventoryService;
use App\Services\OrderReturnService;
use App\Services\OrderStatusService;
use App\Services\PointOfSaleService;
use App\Services\Promotions\PromotionRegistrationService;
use App\Services\Promotions\PromotionService;
use Database\Seeders\PosAccessSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    $this->withoutVite();
    foreach (['inventory.manage', 'orders.manage', 'promotions.manage', 'roles.manage'] as $permission) {
        Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
    }
    Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web'])->givePermissionTo(['inventory.manage', 'orders.manage', 'promotions.manage', 'roles.manage']);
    $this->seed(PosAccessSeeder::class);
    $this->manager = User::create(['name' => 'Manager', 'email' => 'manager@example.test', 'password' => 'secretsecret123', 'is_active' => true]);
    $this->manager->assignRole('administrator');
    $this->seller = User::create(['name' => 'Seller', 'email' => 'seller@example.test', 'password' => 'secretsecret123', 'is_active' => true]);
    $this->seller->assignRole('seller');
    $this->central = InventoryLocation::where('code', 'central')->firstOrFail();
    $pickup = PickupLocation::create(['name' => 'Point A', 'address_line' => 'MegaPlaza', 'district' => 'Ica']);
    $this->point = InventoryLocation::create(['code' => 'point-a', 'name' => 'Point A', 'kind' => 'pos', 'pickup_location_id' => $pickup->id]);
    $this->point->sellers()->attach($this->seller);
    $pickupB = PickupLocation::create(['name' => 'Point B', 'address_line' => 'Ica', 'district' => 'Ica']);
    $this->otherPoint = InventoryLocation::create(['code' => 'point-b', 'name' => 'Point B', 'kind' => 'pos', 'pickup_location_id' => $pickupB->id]);
    $product = Product::create(['name' => 'Chocolate', 'slug' => 'location-chocolate', 'is_active' => true]);
    $this->variant = ProductVariant::create(['product_id' => $product->id, 'name' => '80 g', 'sku' => 'SCAN-SKU', 'barcode' => '7751234567890', 'price_amount' => 2000, 'stock' => 10, 'weight_grams' => 80, 'is_active' => true]);
    $this->method = PaymentMethod::create(['code' => 'pos_cash', 'name' => 'Efectivo', 'provider' => 'manual', 'is_active' => true]);
    OrderStatus::create(['code' => 'delivered', 'name' => 'Entregado']);
    $this->move = ['submission_id' => (string) Str::uuid(), 'from_location_id' => $this->central->id, 'to_location_id' => $this->point->id, 'reason' => 'Abastecimiento de prueba', 'items' => [['variant_id' => $this->variant->id, 'quantity' => 4]]];
    $this->sale = ['pos_submission_id' => (string) Str::uuid(), 'pickup_location_id' => $pickup->id, 'inventory_location_id' => $this->point->id, 'customer_name' => 'Consumidor final', 'discount_amount' => 0, 'payment_confirmed' => true, 'payment_method_id' => $this->method->id, 'items' => [['variant_id' => $this->variant->id, 'quantity' => 2]]];
    app(CashShiftService::class)->open(['submission_id' => (string) Str::uuid(), 'location_id' => $this->point->id, 'opening_cash' => 0], $this->seller);
});

function fundPoint(object $test): void
{
    app(LocationInventoryService::class)->transfer($test->move, $test->manager);
}

it('keeps the existing stock only at central and starts points empty', function () {
    expect($this->variant->fresh()->stock)->toBe(10)->and(LocationStock::count())->toBe(0);
    expect(app(LocationInventoryService::class)->balance($this->variant, $this->point))->toBe(0);
});

it('transfers quantities atomically and idempotently without changing total inventory', function () {
    fundPoint($this);
    app(LocationInventoryService::class)->transfer($this->move, $this->manager);
    expect($this->variant->fresh()->stock)->toBe(6)->and(LocationStock::sum('quantity'))->toBe(4);
    $this->assertDatabaseCount('inventory_transfers', 1);
    $this->assertDatabaseCount('inventory_movements', 2);
});

it('rejects an excessive transfer without partially moving any stock', function () {
    $this->move['items'][0]['quantity'] = 11;
    expect(fn () => app(LocationInventoryService::class)->transfer($this->move, $this->manager))->toThrow(ConflictHttpException::class);
    expect($this->variant->fresh()->stock)->toBe(10)->and(LocationStock::count())->toBe(0);
    $this->assertDatabaseCount('inventory_transfers', 0);
});

it('uses only the selected point balance and returns stock to that point', function () {
    fundPoint($this);
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->seller);
    expect(LocationStock::sum('quantity'))->toBe(2)->and($this->variant->fresh()->stock)->toBe(6);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Producto devuelto', $this->manager);
    expect(LocationStock::sum('quantity'))->toBe(3)->and($this->variant->fresh()->stock)->toBe(6);
});

it('rejects a point sale even if central has stock', function () {
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->seller))->toThrow(ConflictHttpException::class);
    expect(Order::count())->toBe(0)->and($this->variant->fresh()->stock)->toBe(10);
});

it('restores a cancelled historical web order only to central', function () {
    $status = OrderStatus::create(['code' => 'preparing', 'name' => 'Preparando']);
    $cancel = OrderStatus::create(['code' => 'cancelled', 'name' => 'Cancelado']);
    $order = Order::create(['number' => 'historic', 'customer_name' => 'Client', 'customer_email' => '', 'customer_phone' => '', 'delivery_address' => [], 'order_status_id' => $status->id, 'payment_method_id' => $this->method->id, 'subtotal_amount' => 2000, 'total_amount' => 2000, 'inventory_location_id' => $this->central->id]);
    $order->items()->create(['product_variant_id' => $this->variant->id, 'product_name' => 'Chocolate', 'variant_name' => '80 g', 'sku' => 'SCAN-SKU', 'unit_price_amount' => 2000, 'quantity' => 1, 'line_total_amount' => 2000]);
    app(OrderStatusService::class)->transition($order, $cancel, $this->manager);
    expect($this->variant->fresh()->stock)->toBe(11)->and(LocationStock::count())->toBe(0);
});

it('allows seller login but never grants general admin access', function () {
    $this->postJson('/pos/api/login', ['email' => $this->seller->email, 'password' => 'secretsecret123'])->assertOk()->assertJsonCount(1, 'locations')->assertJsonPath('user.can_discount', false);
    $this->get('/admin')->assertForbidden();
    $this->getJson('/pos/api/catalog?location_id='.$this->otherPoint->id)->assertNotFound();
    $this->postJson('/pos/api/logout')->assertOk();
    $this->getJson('/pos/api/session')->assertUnauthorized();
});

it('isolates the POS cookie even when a provider already resolved the session store', function () {
    app('session')->driver()->setName('cacao_session');
    $this->get('/pos')->assertOk()->assertCookie('cacao_pos_session')->assertCookieMissing('cacao_session');
    $this->getJson('/pos/api/session')->assertUnauthorized()->assertJsonStructure(['csrf_token']);
});

it('refuses inactive staff and customer logins without exposing their identity', function () {
    $this->seller->update(['is_active' => false]);
    $this->postJson('/pos/api/login', ['email' => $this->seller->email, 'password' => 'secretsecret123'])->assertUnprocessable();
    $this->assertGuest();
});

it('exposes authorized point stock and exact barcode without central stock leakage', function () {
    fundPoint($this);
    $this->actingAs($this->seller)->getJson('/pos/api/catalog?location_id='.$this->point->id)->assertOk()->assertJsonPath('variants.0.stock', 4)->assertJsonPath('variants.0.barcode', '7751234567890');
});

it('records an API sale once on retries and disallows seller discounts', function () {
    fundPoint($this);
    $payload = [...$this->sale, 'location_id' => $this->point->id];
    $this->actingAs($this->seller)->postJson('/pos/api/sales', $payload)->assertCreated()->assertJsonPath('total_amount', 4000);
    $this->postJson('/pos/api/sales', $payload)->assertCreated();
    expect(Order::count())->toBe(1)->and(LocationStock::sum('quantity'))->toBe(2);
    $this->postJson('/pos/api/sales', [...$payload, 'pos_submission_id' => (string) Str::uuid(), 'discount_amount' => 100])->assertForbidden();
});

it('keeps Yape evidence private and enforces proof ownership', function () {
    Storage::fake('local');
    Storage::fake('public');
    fundPoint($this);
    $this->method->update(['code' => 'yape', 'requires_proof' => false]);
    $payload = [...$this->sale, 'location_id' => $this->point->id];
    $this->actingAs($this->seller)->postJson('/pos/api/sales', $payload)->assertUnprocessable();
    $upload = $this->post('/pos/api/proofs', ['proof' => UploadedFile::fake()->image('yape.jpg')], ['Accept' => 'application/json'])->assertCreated();
    $path = $upload->json('path');
    Storage::disk('local')->assertExists($path);
    Storage::disk('public')->assertMissing($path);
    $response = $this->postJson('/pos/api/sales', [...$payload, 'payment_proof_path' => $path])->assertCreated();
    $this->get('/pos/api/sales/'.$response->json('id').'/proof')->assertOk();
    $this->actingAs($this->manager)->postJson('/pos/api/sales', [...$payload, 'payment_proof_path' => $path])->assertForbidden();
});

it('accepts an explicitly declared missing image for Yape and transfers with an audit trail', function (string $method) {
    fundPoint($this);
    $this->method->update(['code' => $method, 'requires_proof' => true]);
    $payload = [...$this->sale, 'location_id' => $this->point->id];
    $this->actingAs($this->seller)->getJson('/pos/api/catalog?location_id='.$this->point->id)
        ->assertJsonPath('payment_methods.0.can_omit_proof', true);
    $this->postJson('/pos/api/sales', $payload)->assertUnprocessable()->assertJsonValidationErrors('payment_proof_path');
    $this->assertDatabaseCount('orders', 0);
    $payload['payment_proof_missing'] = true;
    $response = $this->postJson('/pos/api/sales', $payload)->assertCreated()->assertJsonPath('payment_proof_missing', true);
    $order = Order::findOrFail($response->json('id'));
    expect($order->payment_proof_missing)->toBeTrue()->and($order->payment_proof_path)->toBeNull()
        ->and($order->cashier_id)->toBe($this->seller->id)
        ->and($order->statusHistories()->first()->note)->toContain('Sin imagen de respaldo');
    $this->postJson('/pos/api/sales', $payload)->assertCreated()->assertJsonPath('id', $order->id);
    expect(Order::count())->toBe(1)->and(LocationStock::sum('quantity'))->toBe(2);
})->with(['yape', 'transfer', 'bank_transfer']);

it('never treats a false missing-image flag as a waiver or skips payment confirmation', function () {
    fundPoint($this);
    $this->method->update(['code' => 'yape']);
    $payload = [...$this->sale, 'location_id' => $this->point->id];
    $this->actingAs($this->seller)->postJson('/pos/api/sales', [...$payload, 'payment_proof_missing' => false])
        ->assertUnprocessable()->assertJsonValidationErrors('payment_proof_path');
    $this->postJson('/pos/api/sales', [...$payload, 'payment_proof_missing' => true, 'payment_confirmed' => false])
        ->assertUnprocessable()->assertJsonValidationErrors('payment_confirmed');
    $this->postJson('/pos/api/sales', [...$payload, 'payment_proof_missing' => 'false'])->assertUnprocessable()->assertJsonValidationErrors('payment_proof_missing');
    $this->assertDatabaseCount('orders', 0);
});

it('rejects a missing-image declaration for other payment methods', function (string $method) {
    fundPoint($this);
    $this->method->update(['code' => $method, 'requires_proof' => true]);
    $this->actingAs($this->seller)->postJson('/pos/api/sales', [...$this->sale, 'location_id' => $this->point->id, 'payment_proof_missing' => true])
        ->assertUnprocessable()->assertJsonValidationErrors('payment_proof_missing');
    $this->assertDatabaseCount('orders', 0);
})->with(['pos_cash', 'plin']);

it('does not permit a proof file and a no-image declaration together', function () {
    fundPoint($this);
    $this->method->update(['code' => 'yape']);
    $this->actingAs($this->seller)->postJson('/pos/api/sales', [...$this->sale, 'location_id' => $this->point->id,
        'payment_proof_missing' => true, 'payment_proof_path' => 'payment-proofs/pos/'.$this->seller->id.'/proof.jpg'])
        ->assertUnprocessable()->assertJsonValidationErrors('payment_proof_missing');
    $this->assertDatabaseCount('orders', 0);
});

it('keeps newly printed coupons reserved until sale handover or audited courtesy', function () {
    fundPoint($this);
    $promotion = Promotion::create(['name' => 'Campaign', 'slug' => 'campaign', 'starts_at' => now()->subDay(), 'ends_at' => now()->addDay(), 'draw_at' => now()->addDays(2), 'is_active' => true, 'legal_reviewed' => true, 'terms_content' => 'Reviewed', 'privacy_content' => 'Reviewed', 'minimum_amount' => 2000, 'amount_per_code' => 2000]);
    $service = app(PromotionService::class);
    $batch = $service->generateBatch($promotion, 'RESERVE', 3, $this->manager);
    $codes = $batch->codes()->get();
    $identity = ['full_name' => 'Ana', 'email' => 'ana@example.test', 'phone' => '999999999', 'terms_accepted' => true];
    expect(fn () => app(PromotionRegistrationService::class)->register($promotion, $codes[0]->code, $identity))->toThrow(ValidationException::class);
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->seller);
    $this->actingAs($this->seller)->postJson('/pos/api/sales/'.$order->id.'/codes', ['code' => $codes[0]->code])->assertOk();
    app(PromotionRegistrationService::class)->register($promotion, $codes[0]->code, $identity);
    expect($codes[0]->fresh()->activation_mode)->toBe('sale')->and($codes[0]->fresh()->status)->toBe('registered');
    $service->enableCourtesy([$codes[1]->id], $this->manager, 'Entrega de cortesía autorizada');
    expect($codes[1]->fresh()->order_id)->toBeNull()->and($codes[1]->fresh()->activation_mode)->toBe('courtesy');
    app(PromotionRegistrationService::class)->register($promotion, $codes[1]->code, $identity);
    $this->assertDatabaseHas('promotion_audit_logs', ['event' => 'code.courtesy_enabled']);
});

it('rolls back sale and stock if a submitted coupon is invalid', function () {
    fundPoint($this);
    $this->actingAs($this->seller)->postJson('/pos/api/sales', [...$this->sale, 'location_id' => $this->point->id, 'promo_codes' => ['ABC234']])->assertNotFound();
    expect(Order::count())->toBe(0)->and(LocationStock::sum('quantity'))->toBe(4);
});

it('opens location administration for managers and POS shell without granting seller admin access', function () {
    $this->get('/pos')->assertOk()->assertHeader('Permissions-Policy', 'camera=(self), microphone=(), geolocation=(self)');
    $this->actingAs($this->manager)->get('/admin/inventory-locations')->assertOk();
    $this->actingAs($this->seller)->get('/admin/inventory-locations')->assertForbidden();
});

it('preserves populated legacy balances and history when assigning the central warehouse', function () {
    // Reconstruct the pre-location schema in dependency order. The shift is
    // only this test's freshly created fixture; no operational history exists.
    DB::table('cash_shifts')->delete();
    $operationsMigration = require database_path('migrations/2026_10_20_000001_create_pos_operations.php');
    $operationsMigration->down();
    $migration = require database_path('migrations/2026_10_17_000001_create_location_inventory_and_pos_access.php');
    $migration->down();
    $order = Order::create(['number' => 'before-locations', 'customer_name' => 'Client', 'customer_email' => 'before@example.test', 'customer_phone' => '', 'delivery_address' => [], 'order_status_id' => OrderStatus::where('code', 'delivered')->value('id'), 'payment_method_id' => $this->method->id, 'subtotal_amount' => 2000, 'total_amount' => 2000]);
    DB::table('inventory_movements')->insert(['product_variant_id' => $this->variant->id, 'order_id' => $order->id, 'type' => 'sale', 'quantity_delta' => -1, 'balance_after' => 10, 'reason' => 'Historical sale', 'created_at' => now(), 'updated_at' => now()]);
    $before = ProductVariant::sum('stock');
    $migration->up();
    $operationsMigration->up();
    $central = InventoryLocation::where('code', 'central')->firstOrFail();
    expect(ProductVariant::sum('stock'))->toBe($before)->and(LocationStock::count())->toBe(0)
        ->and($order->fresh()->inventory_location_id)->toBe($central->id)
        ->and(DB::table('inventory_movements')->value('inventory_location_id'))->toBe($central->id);
});

it('never promotes a seller to administrator through the staff form', function () {
    $this->actingAs($this->manager);
    $sellerRole = Role::findByName('seller');
    Livewire::test(CreateAdminUser::class)
        ->fillForm(['name' => 'New seller', 'email' => 'new-seller@example.test', 'password' => 'SecureSeller2026!', 'is_active' => true, 'roles' => [$sellerRole->id], 'inventoryLocations' => [$this->point->id]])
        ->call('create')->assertHasNoFormErrors();
    $seller = User::where('email', 'new-seller@example.test')->firstOrFail();
    expect($seller->hasRole('seller'))->toBeTrue()->and($seller->hasRole('administrator'))->toBeFalse()->and($seller->inventoryLocations()->count())->toBe(1);
});

it('allows only administrators to enable courtesy codes and never modifies a registered code', function () {
    $promotion = Promotion::create(['name' => 'Courtesy campaign', 'slug' => 'courtesy', 'starts_at' => now()->subDay(), 'ends_at' => now()->addDay(), 'draw_at' => now()->addDays(2), 'is_active' => true, 'legal_reviewed' => true, 'terms_content' => 'Reviewed', 'privacy_content' => 'Reviewed', 'minimum_amount' => 2000, 'amount_per_code' => 2000]);
    $service = app(PromotionService::class);
    $code = $service->generateBatch($promotion, 'FREE', 1, $this->manager)->codes()->first();
    expect(fn () => $service->enableCourtesy([$code->id], $this->seller, 'Entrega gratuita'))->toThrow(HttpException::class);
    $service->enableCourtesy([$code->id], $this->manager, 'Entrega gratuita autorizada');
    $service->reserveCodes([$code->id], $this->manager, 'Cupón retenido en almacén');
    expect($code->fresh()->activation_mode)->toBe('reserve');
    $service->enableCourtesy([$code->id], $this->manager, 'Entrega gratuita autorizada');
    app(PromotionRegistrationService::class)->register($promotion, $code->code, ['full_name' => 'Ana', 'email' => 'ana@example.test', 'phone' => '999999999', 'terms_accepted' => true]);
    expect(fn () => $service->reserveCodes([$code->id], $this->manager, 'No debe modificarse'))->toThrow(ValidationException::class);
    expect($code->fresh()->status)->toBe('registered')->and($code->fresh()->participant_id)->not->toBeNull();
});
