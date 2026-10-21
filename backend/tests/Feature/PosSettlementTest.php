<?php

use App\Filament\Resources\OrderResource\Pages\EditOrder;
use App\Models\InventoryLocation;
use App\Models\LocationStock;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Services\CashShiftService;
use App\Services\OrderReturnService;
use App\Services\PointOfSaleService;
use Database\Seeders\PosAccessSeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    $this->withoutVite();
    Storage::fake('local');
    Permission::firstOrCreate(['name' => 'orders.manage', 'guard_name' => 'web']);
    $role = Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $role->givePermissionTo('orders.manage');
    $this->seed(PosAccessSeeder::class);
    $this->manager = User::create(['name' => 'Manager', 'email' => 'settlement@example.test', 'password' => 'test-password', 'is_active' => true]);
    $this->manager->assignRole($role);
    $pickup = PickupLocation::create(['name' => 'Settlement store', 'address_line' => 'Local', 'district' => 'Ica']);
    $this->point = InventoryLocation::create(['code' => 'settlement-point', 'name' => 'Store', 'kind' => 'pos', 'pickup_location_id' => $pickup->id]);
    $product = Product::create(['name' => 'Chocolate', 'slug' => 'settlement-product', 'is_active' => true]);
    $this->variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Pack', 'sku' => 'PAY-PACK', 'weight_grams' => 100, 'price_amount' => 6600, 'stock' => 10, 'is_active' => true]);
    LocationStock::create(['inventory_location_id' => $this->point->id, 'product_variant_id' => $this->variant->id, 'quantity' => 10]);
    $this->cash = PaymentMethod::create(['name' => 'Efectivo', 'code' => 'pos_cash', 'provider' => 'manual', 'is_active' => true]);
    $this->yape = PaymentMethod::create(['name' => 'Yape', 'code' => 'yape', 'provider' => 'manual', 'is_active' => true]);
    OrderStatus::create(['code' => 'delivered', 'name' => 'Entregado']);
    $this->sale = ['pos_submission_id' => (string) Str::uuid(), 'pickup_location_id' => $pickup->id,
        'inventory_location_id' => $this->point->id, 'customer_name' => 'Consumidor final', 'payment_confirmed' => true,
        'discount_type' => 'percentage', 'discount_percentage' => 1000,
        'items' => [['variant_id' => $this->variant->id, 'quantity' => 1]],
        'payments' => [['payment_method_id' => $this->cash->id, 'amount' => 2000],
            ['payment_method_id' => $this->yape->id, 'amount' => 3940, 'proof_missing' => true]]];
    app(CashShiftService::class)->open(['submission_id' => (string) Str::uuid(), 'location_id' => $this->point->id, 'opening_cash' => 0], $this->manager);
});

it('calculates a percentage on server prices and persists each payment atomically and once', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $retry = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    expect($retry->id)->toBe($order->id)->and($order->discount_amount)->toBe(660)->and($order->total_amount)->toBe(5940)
        ->and($order->pos_discount_basis_points)->toBe(1000)->and($order->posPayments()->sum('amount'))->toBe(5940)
        ->and(OrderPayment::count())->toBe(2)->and(LocationStock::first()->quantity)->toBe(9)->and($this->variant->fresh()->stock)->toBe(10);
});

it('records cash received and server calculated change without inflating split payments or shift income', function () {
    $this->sale['payments'][0]['cash_received_amount'] = 5000;
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $cash = $order->posPayments()->where('payment_method_id', $this->cash->id)->firstOrFail();
    $digital = $order->posPayments()->where('payment_method_id', $this->yape->id)->firstOrFail();
    expect($cash->amount)->toBe(2000)->and($cash->cash_received_amount)->toBe(5000)->and($cash->change_amount)->toBe(3000)
        ->and($digital->cash_received_amount)->toBeNull()->and($digital->change_amount)->toBeNull();
    $summary = app(CashShiftService::class)->summary($order->cash_shift_id, $this->manager);
    $method = collect($summary['methods'])->firstWhere('payment_method_id', $this->cash->id);
    expect($method['expected'])->toBe(2000);
    $retry = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    expect($retry->id)->toBe($order->id)->and(OrderPayment::count())->toBe(2);
});

it('rejects insufficient cash invalid cash amounts digital cash metadata and client supplied change atomically', function () {
    foreach ([['cash_received_amount' => 1999], ['cash_received_amount' => -1], ['cash_received_amount' => 2000.5], ['cash_received_amount' => 1000000001], ['change_amount' => 999]] as $invalid) {
        $data = $this->sale;
        $data['payments'][0] = [...$data['payments'][0], ...$invalid];
        expect(fn () => app(PointOfSaleService::class)->sell($data, $this->manager))->toThrow(ValidationException::class);
    }
    $this->sale['payments'][1]['cash_received_amount'] = 5000;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(ValidationException::class);
    expect(Order::count())->toBe(0)->and(OrderPayment::count())->toBe(0)->and(LocationStock::first()->quantity)->toBe(10);
});

it('supports an amount discount and a single payment with automatic legacy total', function () {
    unset($this->sale['payments'], $this->sale['discount_percentage']);
    $order = app(PointOfSaleService::class)->sell([...$this->sale, 'discount_type' => 'amount', 'discount_amount' => 650, 'payment_method_id' => $this->cash->id], $this->manager);
    expect($order->total_amount)->toBe(5950)->and($order->posPayments()->first()->amount)->toBe(5950)->and($order->pos_discount_basis_points)->toBeNull()
        ->and($order->posPayments()->first()->cash_received_amount)->toBe(5950)->and($order->posPayments()->first()->change_amount)->toBe(0);
});

it('rounds percentage discounts to the nearest cent using integers', function () {
    $this->variant->update(['price_amount' => 101]);
    $this->sale['discount_percentage'] = 5000;
    $this->sale['payments'] = [['payment_method_id' => $this->cash->id, 'amount' => 50]];
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    expect($order->discount_amount)->toBe(51)->and($order->total_amount)->toBe(50);
});

it('rejects simultaneous discount types and invalid percentages', function () {
    foreach ([['discount_amount' => 1], ['discount_percentage' => 10001], ['discount_percentage' => -1], ['discount_percentage' => 1.5]] as $invalid) {
        expect(fn () => app(PointOfSaleService::class)->sell([...$this->sale, ...$invalid], $this->manager))->toThrow(ValidationException::class);
    }
    expect(Order::count())->toBe(0)->and(OrderPayment::count())->toBe(0)->and(LocationStock::first()->quantity)->toBe(10);
});

it('rejects underpayment overpayment duplicate methods and empty installments', function () {
    foreach ([3939, 3941, 0] as $amount) {
        $data = $this->sale;
        $data['payments'][1]['amount'] = $amount;
        expect(fn () => app(PointOfSaleService::class)->sell($data, $this->manager))->toThrow(ValidationException::class);
    }
    $this->sale['payments'][1]['payment_method_id'] = $this->cash->id;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(ValidationException::class);
    expect(OrderPayment::count())->toBe(0)->and(LocationStock::first()->quantity)->toBe(10);
});

it('requires separate evidence or an explicit omission for each applicable payment', function () {
    unset($this->sale['payments'][1]['proof_missing']);
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(ValidationException::class);
    $path = 'payment-proofs/pos/'.$this->manager->id.'/valid123.jpg';
    Storage::disk('local')->put($path, 'fixture');
    $this->sale['payments'][1]['proof_path'] = $path;
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $this->actingAs($this->manager)->get('/pos/api/sales/'.$order->id.'/proof?payment_id='.$order->posPayments()->where('payment_method_id', $this->yape->id)->first()->id)->assertOk();
    expect($order->payment_proof_missing)->toBeFalse()->and($order->posPayments()->whereNotNull('proof_path')->count())->toBe(1);
});

it('rejects foreign payment proof ownership and conflicting omission declarations', function () {
    $this->sale['payments'][1]['proof_path'] = 'payment-proofs/pos/999999/foreign.jpg';
    $this->sale['payments'][1]['proof_missing'] = false;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(HttpException::class);
    $this->sale['payments'][1]['proof_missing'] = true;
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(ValidationException::class);
});

it('disallows seller percentage discounts and inactive payment methods', function () {
    $seller = User::create(['name' => 'Seller', 'email' => 'pay-seller@example.test', 'password' => 'test-password', 'is_active' => true]);
    $seller->assignRole('seller');
    $this->point->sellers()->attach($seller);
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $seller))->toThrow(HttpException::class);
    $this->yape->update(['is_active' => false]);
    expect(fn () => app(PointOfSaleService::class)->sell($this->sale, $this->manager))->toThrow(ValidationException::class);
});

it('returns a receipt with all payments through the POS API', function () {
    $this->actingAs($this->manager)->postJson('/pos/api/sales', [...$this->sale, 'location_id' => $this->point->id])
        ->assertCreated()->assertJsonPath('discount_amount', 660)->assertJsonPath('total_amount', 5940)
        ->assertJsonCount(2, 'payments')->assertJsonPath('payments.1.amount', 3940)->assertJsonPath('payments.1.proof_missing', true);
});

it('keeps the settlement history when products are returned', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    app(OrderReturnService::class)->process($order, [$order->items->first()->id => 1], 'Devolución de prueba', $this->manager);
    expect(LocationStock::first()->quantity)->toBe(10)->and($order->posPayments()->sum('amount'))->toBe(5940);
});

it('allows a fully discounted sale with one zero payment only', function () {
    $this->sale['discount_percentage'] = 10000;
    $this->sale['payments'] = [['payment_method_id' => $this->cash->id, 'amount' => 0]];
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    expect($order->total_amount)->toBe(0)->and($order->posPayments()->first()->amount)->toBe(0);
});

it('shows the immutable payment breakdown in order administration', function () {
    $order = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $this->actingAs($this->manager);
    Livewire::test(EditOrder::class, ['record' => $order->id])
        ->assertSee('Desglose de pagos recibidos en caja')->assertSet('data.pos_discount_basis_points', '10.00 %');
    expect($order->posPayments()->count())->toBe(2);
});

it('never downloads a payment proof through a different order', function () {
    $first = app(PointOfSaleService::class)->sell($this->sale, $this->manager);
    $second = app(PointOfSaleService::class)->sell([...$this->sale, 'pos_submission_id' => (string) Str::uuid()], $this->manager);
    $this->actingAs($this->manager)->get('/pos/api/sales/'.$second->id.'/proof?payment_id='.$first->posPayments()->first()->id)->assertNotFound();
});
