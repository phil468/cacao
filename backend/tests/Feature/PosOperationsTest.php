<?php

use App\Filament\Resources\InventoryLocationResource\Pages\ListInventoryLocations;
use App\Models\InventoryLocation;
use App\Models\InventoryMovement;
use App\Models\LocationStock;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PromoCode;
use App\Models\User;
use App\Services\CashShiftService;
use App\Services\OrderReturnService;
use App\Services\PointOfSaleService;
use App\Services\PosDailyReportService;
use App\Services\PosInventoryOperationsService;
use App\Services\Promotions\PromotionService;
use App\Services\ReplenishmentService;
use Database\Seeders\PosAccessSeeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    $this->withoutVite();
    foreach (['orders.manage', 'inventory.manage'] as $name) {
        Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
    }
    $role = Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $role->givePermissionTo(['orders.manage', 'inventory.manage']);
    $this->seed(PosAccessSeeder::class);
    $this->manager = User::create(['name' => 'Manager', 'email' => 'operations@example.test', 'password' => 'test-password', 'is_active' => true]);
    $this->manager->assignRole($role);
    $this->seller = User::create(['name' => 'Seller', 'email' => 'operations-seller@example.test', 'password' => 'test-password', 'is_active' => true]);
    $this->seller->assignRole('seller');
    $pickup = PickupLocation::create(['name' => 'Test store', 'address_line' => 'Local', 'district' => 'Ica']);
    $this->point = InventoryLocation::create(['code' => 'operations-point', 'name' => 'Store', 'kind' => 'pos', 'pickup_location_id' => $pickup->id]);
    $this->point->sellers()->attach($this->seller);
    $product = Product::create(['name' => 'Chocolate', 'slug' => 'operations-product', 'is_active' => true]);
    $this->variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Pack', 'sku' => 'OPS-PACK', 'weight_grams' => 100, 'price_amount' => 2000, 'stock' => 20, 'is_active' => true]);
    LocationStock::create(['inventory_location_id' => $this->point->id, 'product_variant_id' => $this->variant->id, 'quantity' => 10]);
    $this->cash = PaymentMethod::create(['name' => 'Efectivo', 'code' => 'pos_cash', 'provider' => 'manual', 'is_active' => true]);
    $this->yape = PaymentMethod::create(['name' => 'Yape', 'code' => 'yape', 'provider' => 'manual', 'is_active' => true]);
    OrderStatus::create(['code' => 'delivered', 'name' => 'Entregado']);
    $this->opening = ['submission_id' => (string) Str::uuid(), 'location_id' => $this->point->id, 'opening_cash' => 1000];
    $this->shift = app(CashShiftService::class)->open($this->opening, $this->manager);
    $this->sale = ['pos_submission_id' => (string) Str::uuid(), 'inventory_location_id' => $this->point->id, 'pickup_location_id' => $pickup->id, 'customer_name' => 'Consumidor final', 'payment_method_id' => $this->cash->id, 'discount_amount' => 0, 'payment_confirmed' => true, 'items' => [['variant_id' => $this->variant->id, 'quantity' => 1]]];
    $this->historical = [...$this->sale, 'pos_submission_id' => (string) Str::uuid(), 'is_historical' => true, 'sold_on' => now()->subDays(2)->toDateString(), 'historical_reason' => 'Regularización de venta antigua', 'items' => [['variant_id' => $this->variant->id, 'quantity' => 2, 'unit_price_amount' => 1500]]];
});

function opsClose(object $test): array
{
    $summary = app(CashShiftService::class)->summary($test->shift, $test->manager);

    return app(CashShiftService::class)->close($test->shift, ['counts' => array_map(fn ($m) => ['payment_method_id' => $m['payment_method_id'], 'counted_amount' => $m['expected']], $summary['methods']), 'reason' => 'Arqueo de cierre verificado'], $test->manager);
}
function opsOut(object $test, string $kind = 'gift', int $quantity = 1): array
{
    return ['submission_id' => (string) Str::uuid(), 'location_id' => $test->point->id, 'kind' => $kind, 'reason' => 'Movimiento de prueba autorizado', 'items' => [['variant_id' => $test->variant->id, 'quantity' => $quantity]]];
}
function opsCount(object $test): array
{
    return ['submission_id' => (string) Str::uuid(), 'location_id' => $test->point->id, 'reason' => 'Conteo físico diario verificado', 'counts' => array_map(fn ($r) => ['variant_id' => $r['variant_id'], 'expected' => $r['available'], 'counted' => $r['available'], 'quarantine_expected' => $r['quarantine'], 'quarantine_counted' => $r['quarantine']], app(PosInventoryOperationsService::class)->rows($test->point))];
}

it('requires a current own shift for ordinary sales and retains sale retries after closure', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    expect($order->cash_shift_id)->toBe($this->shift);
    opsClose($this);
    expect(app(PointOfSaleService::class)->sell($this->sale, $this->manager)->id)->toBe($order->id);
    expect(fn () => app(PointOfSaleService::class)->sell([...$this->sale, 'pos_submission_id' => (string) Str::uuid()], $this->manager))->toThrow(ValidationException::class);
    expect(LocationStock::first()->quantity)->toBe(9);
});
it('registers a historical sale at actual prices without touching current stock cash or creation date', function () {
    opsClose($this);
    $before = app(CashShiftService::class)->summary($this->shift, $this->manager);
    $this->variant->update(['is_active' => false]);
    LocationStock::first()->update(['quantity' => 0]);
    $order = app(PointOfSaleService::class)->sell($this->historical, $this->manager);
    expect($order->total_amount)->toBe(3000)->and($order->cash_shift_id)->toBeNull()->and($order->is_historical)->toBeTrue()
        ->and($order->created_at->toDateString())->toBe(now()->toDateString())->and($order->getAttribute('sold_on')->format('Y-m-d'))->toBe($this->historical['sold_on'])
        ->and(LocationStock::first()->quantity)->toBe(0)->and($this->variant->fresh()->stock)->toBe(20)->and(InventoryMovement::count())->toBe(0)
        ->and(app(CashShiftService::class)->summary($this->shift, $this->manager))->toEqual($before);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Devolución histórica', $this->manager);
    expect(LocationStock::first()->quantity)->toBe(0)->and(InventoryMovement::count())->toBe(0);
});
it('rejects future historical dates sellers and normal price overrides', function () {
    expect(fn () => app(PointOfSaleService::class)->sell([...$this->historical, 'sold_on' => now()->toDateString()], $this->manager))->toThrow(ValidationException::class);
    expect(fn () => app(PointOfSaleService::class)->sell($this->historical, $this->seller))->toThrow(HttpException::class);
    expect(fn () => app(PointOfSaleService::class)->sell([...$this->sale, 'items' => $this->historical['items']], $this->manager))->toThrow(ValidationException::class);
});
it('never enables coupons for a historical regularization', function () {
    $order = app(PointOfSaleService::class)->sell($this->historical, $this->manager);
    expect(fn () => app(PromotionService::class)->recordDelivery(new PromoCode, $order, $this->manager))->toThrow(ValidationException::class);
});
it('keeps immutable closing snapshots despite later historical incorporations', function () {
    app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $closed = opsClose($this);
    $day = now()->toDateString();
    $this->travel(1)->days();
    app(PointOfSaleService::class)->sell([...$this->historical, 'sold_on' => $day], $this->manager);
    $report = app(PosDailyReportService::class)->build($this->point->id, $day, $this->manager);
    expect($report['sales_total'])->toBe(5000)->and($report['historical_total'])->toBe(3000)
        ->and(app(CashShiftService::class)->summary($this->shift, $this->manager))->toEqual($closed)->and($closed['sales_total'])->toBe(2000);
});
it('opens sequential cashier shifts without overlapping at one point', function () {
    expect(app(CashShiftService::class)->open($this->opening, $this->manager))->toBe($this->shift);
    expect(fn () => app(CashShiftService::class)->open([...$this->opening, 'submission_id' => (string) Str::uuid()], $this->seller))->toThrow(ValidationException::class);
    opsClose($this);
    $id = app(CashShiftService::class)->open([...$this->opening, 'submission_id' => (string) Str::uuid(), 'opening_cash' => 500], $this->seller);
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->seller);
    expect($order->cash_shift_id)->toBe($id)->and(DB::table('cash_shifts')->count())->toBe(2);
    $this->travel(1)->days();
    expect(fn () => app(PointOfSaleService::class)->sell([...$this->sale, 'pos_submission_id' => (string) Str::uuid()], $this->seller))->toThrow(ValidationException::class);
    expect(fn () => app(CashShiftService::class)->entry($id, ['submission_id' => (string) Str::uuid(), 'kind' => 'in', 'amount' => 100, 'payment_method_id' => $this->cash->id, 'reason' => 'Movimiento de hoy en turno anterior'], $this->seller))->toThrow(ValidationException::class);
});
it('reconciles split tenders separately from cash and logs entries idempotently', function () {
    $data = $this->sale;
    unset($data['payment_method_id']);
    $data['payments'] = [['payment_method_id' => $this->cash->id, 'amount' => 500], ['payment_method_id' => $this->yape->id, 'amount' => 1500, 'proof_missing' => true]];
    app(PointOfSaleService::class)->sell($data, $this->manager);
    $entry = ['submission_id' => (string) Str::uuid(), 'kind' => 'out', 'amount' => 200, 'payment_method_id' => $this->cash->id, 'reason' => 'Retiro de prueba'];
    app(CashShiftService::class)->entry($this->shift, $entry, $this->manager);
    app(CashShiftService::class)->entry($this->shift, $entry, $this->manager);
    $summary = app(CashShiftService::class)->summary($this->shift, $this->manager);
    expect($summary['methods'][0]['expected'])->toBe(1300)->and($summary['methods'][1]['expected'])->toBe(1500)->and(DB::table('cash_entries')->count())->toBe(1);
    $counts = array_map(fn ($m) => ['payment_method_id' => $m['payment_method_id'], 'counted_amount' => $m['expected'] - 100], $summary['methods']);
    $payload = ['counts' => $counts, 'reason' => 'Diferencias de arqueo documentadas'];
    $closed = app(CashShiftService::class)->close($this->shift, $payload, $this->manager);
    expect($closed['methods'][0]['difference'])->toBe(-100)->and(app(CashShiftService::class)->close($this->shift, $payload, $this->manager))->toEqual($closed);
    expect(fn () => app(CashShiftService::class)->close($this->shift, [...$payload, 'reason' => 'Intento de cambiar cierre'], $this->manager))->toThrow(ConflictHttpException::class);
});
it('records refunds once in the current shift without changing a prior closing', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $first = opsClose($this);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Devolución del producto', $this->manager);
    $next = app(CashShiftService::class)->open([...$this->opening, 'submission_id' => (string) Str::uuid(), 'opening_cash' => 3000], $this->manager);
    $data = ['submission_id' => (string) Str::uuid(), 'kind' => 'refund', 'amount' => 2000, 'payment_method_id' => $this->cash->id, 'order_id' => $order->id, 'reason' => 'Reembolso verificado en efectivo'];
    app(CashShiftService::class)->entry($next, $data, $this->manager);
    expect(app(CashShiftService::class)->summary($next, $this->manager)['methods'][0]['expected'])->toBe(1000)
        ->and(app(CashShiftService::class)->summary($this->shift, $this->manager))->toEqual($first);
    expect(fn () => app(CashShiftService::class)->entry($next, [...$data, 'submission_id' => (string) Str::uuid()], $this->manager))->toThrow(ValidationException::class);
});
it('records gifts and samples as whole-unit audited non-sales without duplicates', function (string $kind) {
    $data = opsOut($this, $kind, 2);
    $id = app(PosInventoryOperationsService::class)->record($data, $this->seller);
    expect(app(PosInventoryOperationsService::class)->record($data, $this->seller))->toBe($id)->and(LocationStock::first()->quantity)->toBe(8)
        ->and(Order::count())->toBe(0)->and(InventoryMovement::first()->type)->toBe($kind)->and(DB::table('inventory_operations')->count())->toBe(1);
})->with(['gift', 'sample']);
it('quarantines defects and keeps disposal separate from available inventory', function () {
    app(PosInventoryOperationsService::class)->record(opsOut($this, 'damaged', 3), $this->seller);
    expect(LocationStock::first()->quantity)->toBe(7)->and((int) DB::table('quarantine_stocks')->value('quantity'))->toBe(3);
    expect(fn () => app(PosInventoryOperationsService::class)->record(opsOut($this, 'release'), $this->seller))->toThrow(HttpException::class);
    app(PosInventoryOperationsService::class)->record(opsOut($this, 'writeoff'), $this->manager);
    app(PosInventoryOperationsService::class)->record(opsOut($this, 'release'), $this->manager);
    expect(LocationStock::first()->quantity)->toBe(8)->and((int) DB::table('quarantine_stocks')->value('quantity'))->toBe(1);
});
it('returns a defective sold product directly to quarantine not the shelf', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Producto fallado devuelto', $this->manager, true);
    expect(LocationStock::first()->quantity)->toBe(9)->and((int) DB::table('quarantine_stocks')->value('quantity'))->toBe(1);
});
it('rolls back an entire multi-product out operation on shortage', function () {
    $other = ProductVariant::create(['product_id' => $this->variant->product_id, 'name' => 'Sin saldo', 'sku' => 'OPS-EMPTY', 'weight_grams' => 100, 'price_amount' => 2000, 'stock' => 0, 'is_active' => true]);
    LocationStock::create(['inventory_location_id' => $this->point->id, 'product_variant_id' => $other->id, 'quantity' => 0]);
    $data = opsOut($this, 'damaged', 2);
    $data['items'][] = ['variant_id' => $other->id, 'quantity' => 1];
    expect(fn () => app(PosInventoryOperationsService::class)->record($data, $this->manager))->toThrow(ConflictHttpException::class);
    expect(LocationStock::first()->quantity)->toBe(10)->and(DB::table('quarantine_stocks')->count())->toBe(0)->and(DB::table('inventory_operations')->count())->toBe(0);
});
it('requires cash closure and a fresh complete physical count for daily inventory', function () {
    $data = opsCount($this);
    expect(fn () => app(PosInventoryOperationsService::class)->close($data, $this->manager))->toThrow(ValidationException::class);
    opsClose($this);
    app(PosInventoryOperationsService::class)->record(opsOut($this), $this->manager);
    expect(fn () => app(PosInventoryOperationsService::class)->close($data, $this->manager))->toThrow(ConflictHttpException::class);
    $fresh = opsCount($this);
    $id = app(PosInventoryOperationsService::class)->close($fresh, $this->manager);
    expect(app(PosInventoryOperationsService::class)->close($fresh, $this->manager))->toBe($id)->and(DB::table('inventory_closings')->count())->toBe(1);
    expect(fn () => app(CashShiftService::class)->open([...$this->opening, 'submission_id' => (string) Str::uuid()], $this->manager))->toThrow(ValidationException::class);
    expect(fn () => app(PosInventoryOperationsService::class)->record(opsOut($this), $this->manager))->toThrow(ValidationException::class);
});
it('audits count differences only for inventory managers and preserves the closing snapshot', function () {
    opsClose($this);
    $data = opsCount($this);
    $data['counts'][0]['counted'] = 8;
    expect(fn () => app(PosInventoryOperationsService::class)->close($data, $this->seller))->toThrow(HttpException::class);
    app(PosInventoryOperationsService::class)->close($data, $this->manager);
    $snapshot = DB::table('inventory_closings')->value('snapshot');
    expect(LocationStock::first()->quantity)->toBe(8)->and(InventoryMovement::first()->type)->toBe('count_adjustment');
    $this->travel(1)->days();
    app(PosInventoryOperationsService::class)->record(opsOut($this), $this->manager);
    expect(DB::table('inventory_closings')->value('snapshot'))->toBe($snapshot);
});
it('uses per-point minimum targets and requests stock without changing or reserving it', function () {
    $service = app(ReplenishmentService::class);
    $service->settings(['location_id' => $this->point->id, 'items' => [['variant_id' => $this->variant->id, 'minimum_quantity' => 10, 'target_quantity' => 15]]], $this->manager);
    $rows = app(PosInventoryOperationsService::class)->rows($this->point);
    expect($rows[0]['suggested'])->toBe(5);
    $data = opsOut($this);
    unset($data['kind']);
    $data['items'][0]['quantity'] = 5;
    $id = $service->request($data, $this->seller);
    expect($service->request($data, $this->seller))->toBe($id)->and(LocationStock::first()->quantity)->toBe(10)->and($this->variant->fresh()->stock)->toBe(20);
    $transfer = $service->fulfill($id, $this->manager);
    expect($service->fulfill($id, $this->manager))->toBe($transfer)->and(LocationStock::first()->quantity)->toBe(15)->and($this->variant->fresh()->stock)->toBe(15);
});
it('does not fulfill a request partially or let sellers transfer central stock', function () {
    $data = opsOut($this);
    unset($data['kind']);
    $data['items'][0]['quantity'] = 21;
    $id = app(ReplenishmentService::class)->request($data, $this->seller);
    expect(fn () => app(ReplenishmentService::class)->fulfill($id, $this->seller))->toThrow(HttpException::class);
    expect(fn () => app(ReplenishmentService::class)->fulfill($id, $this->manager))->toThrow(ConflictHttpException::class);
    expect(DB::table('replenishment_requests')->where('id', $id)->value('status'))->toBe('pending')->and(LocationStock::first()->quantity)->toBe(10);
});
it('exposes authorized operations and historical sales through the protected API', function () {
    $this->actingAs($this->manager)->getJson('/pos/api/operations?location_id='.$this->point->id)->assertOk()->assertJsonPath('shift.id', $this->shift)->assertJsonCount(1, 'inventory');
    $this->postJson('/pos/api/sales', [...$this->historical, 'location_id' => $this->point->id])->assertCreated()->assertJsonPath('is_historical', true);
    $this->getJson('/pos/api/operations/report?location_id='.$this->point->id.'&date='.$this->historical['sold_on'])->assertOk()->assertJsonPath('historical_count', 1);
    $this->actingAs($this->seller)->getJson('/pos/api/operations/report?location_id='.$this->point->id.'&date='.now()->toDateString())->assertForbidden();
});

it('resumes the operations migration without losing operational records', function () {
    app(PosInventoryOperationsService::class)->record(opsOut($this, 'damaged', 2), $this->manager);
    Schema::table('quarantine_stocks', fn (Blueprint $t) => $t->dropUnique('quarantine_location_variant_unique'));
    $migration = require database_path('migrations/2026_10_20_000001_create_pos_operations.php');
    $migration->up();
    expect((int) DB::table('quarantine_stocks')->value('quantity'))->toBe(2)->and(DB::table('cash_shifts')->count())->toBe(1)
        ->and(Schema::hasIndex('quarantine_stocks', 'quarantine_location_variant_unique'))->toBeTrue();
});

it('preserves same-second transfers after a daily closing in the next inventory interval', function () {
    $this->freezeTime();
    opsClose($this);
    app(PosInventoryOperationsService::class)->close(opsCount($this), $this->manager);
    $request = opsOut($this);
    unset($request['kind']);
    $request['items'][0]['quantity'] = 2;
    $id = app(ReplenishmentService::class)->request($request, $this->manager);
    app(ReplenishmentService::class)->fulfill($id, $this->manager);
    $this->travel(1)->days();
    $closing = app(PosInventoryOperationsService::class)->close(opsCount($this), $this->manager);
    $snapshot = json_decode(DB::table('inventory_closings')->where('id', $closing)->value('snapshot'), true);
    expect($snapshot['rows'][0]['opening'])->toBe(10)->and($snapshot['rows'][0]['movements']['transfer_in'])->toBe(2)->and($snapshot['rows'][0]['counted'])->toBe(12);
});

it('refuses rollback that would erase the stock-neutral historical flag', function () {
    DB::table('cash_shifts')->delete();
    app(PointOfSaleService::class)->sell($this->historical, $this->manager);
    $migration = require database_path('migrations/2026_10_20_000001_create_pos_operations.php');
    expect(fn () => $migration->down())->toThrow(RuntimeException::class);
    expect(Schema::hasColumn('orders', 'is_historical'))->toBeTrue()->and(Order::first()->is_historical)->toBeTrue();
});

it('lets inventory administrators release quarantined web returns at central', function () {
    $central = InventoryLocation::where('code', 'central')->firstOrFail();
    $order = Order::create(['number' => (string) Str::uuid(), 'sales_channel' => 'web', 'inventory_location_id' => $central->id, 'customer_name' => 'Web client', 'customer_email' => 'web@example.test', 'customer_phone' => '', 'delivery_address' => [],
        'payment_method_id' => $this->cash->id, 'order_status_id' => OrderStatus::where('code', 'delivered')->value('id'), 'subtotal_amount' => 2000, 'total_amount' => 2000]);
    $item = $order->items()->create(['product_variant_id' => $this->variant->id, 'product_name' => 'Chocolate', 'variant_name' => 'Pack', 'sku' => $this->variant->sku, 'quantity' => 1, 'unit_price_amount' => 2000, 'line_total_amount' => 2000]);
    app(OrderReturnService::class)->process($order, [$item->id => 1], 'Devolución web fallada', $this->manager, true);
    $this->actingAs($this->manager);
    $page = Livewire::test(ListInventoryLocations::class)->mountTableAction('quarantine', $central);
    foreach ($page->get('mountedActions.0.data.items') as $key => $row) {
        $page->set('mountedActions.0.data.items.'.$key.'.quantity', 1);
    }
    $page->set('mountedActions.0.data.kind', 'release')->set('mountedActions.0.data.reason', 'Producto verificado apto para venta')->callMountedTableAction()->assertHasNoErrors();
    expect($this->variant->fresh()->stock)->toBe(21)->and((int) DB::table('quarantine_stocks')->where('inventory_location_id', $central->id)->value('quantity'))->toBe(0);
});
