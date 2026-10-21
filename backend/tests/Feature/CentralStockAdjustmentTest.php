<?php

use App\Filament\Resources\ProductVariantResource\Pages\ListProductVariants;
use App\Models\InventoryMovement;
use App\Models\LocationStock;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Services\CentralStockAdjustmentService;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $role->givePermissionTo(Permission::firstOrCreate(['name' => 'inventory.manage', 'guard_name' => 'web']));
    $this->manager = User::create(['name' => 'Stock manager', 'email' => 'adjust-manager@example.test', 'password' => 'testing-password', 'is_active' => true]);
    $this->manager->assignRole($role);
    $product = Product::create(['name' => 'Adjustment chocolate', 'slug' => 'adjustment-chocolate']);
    $this->variants = collect([10, 5])->map(fn ($stock, $i) => ProductVariant::create([
        'product_id' => $product->id, 'name' => 'Variant '.$i, 'sku' => 'ADJUST-'.$i,
        'weight_grams' => 100, 'price_amount' => 1000, 'stock' => $stock,
    ]));
    $this->payload = ['reason' => 'Conteo físico verificado', 'items' => $this->variants->map(fn ($variant) => [
        'id' => $variant->id, 'expected_stock' => $variant->stock, 'stock' => $variant->stock + 2,
    ])->all()];
});

it('adjusts central balances together with an audit and no transfer', function () {
    app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager);
    expect($this->variants[0]->fresh()->stock)->toBe(12)->and($this->variants[1]->fresh()->stock)->toBe(7)
        ->and(InventoryMovement::count())->toBe(2)->and(InventoryMovement::sum('quantity_delta'))->toBe(4)
        ->and(InventoryMovement::first()->actor_id)->toBe($this->manager->id)
        ->and(LocationStock::count())->toBe(0);
});

it('rolls back all rows when a sale or transfer changed a balance', function () {
    $this->variants[1]->update(['stock' => 4]);
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager))->toThrow(ValidationException::class);
    expect($this->variants[0]->fresh()->stock)->toBe(10)->and($this->variants[1]->fresh()->stock)->toBe(4)->and(InventoryMovement::count())->toBe(0);
});

it('rejects a negative or fractional balance and an empty reason', function () {
    $this->payload['items'][0]['stock'] = -1;
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager))->toThrow(ValidationException::class);
    $this->payload['items'][0]['stock'] = 1.5;
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager))->toThrow(ValidationException::class);
    $this->payload['items'][0]['stock'] = 2;
    $this->payload['reason'] = '   ';
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager))->toThrow(ValidationException::class);
    expect(InventoryMovement::count())->toBe(0);
});

it('does not create a movement for an unchanged balance', function () {
    foreach ($this->payload['items'] as &$item) {
        $item['stock'] = $item['expected_stock'];
    }
    app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager);
    expect(InventoryMovement::count())->toBe(0);
});

it('rejects inactive actors and users without inventory permission', function () {
    $this->manager->update(['is_active' => false]);
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $this->manager))->toThrow(HttpException::class);
    $user = User::create(['name' => 'Viewer', 'email' => 'adjust-viewer@example.test', 'password' => 'testing-password', 'is_active' => true]);
    expect(fn () => app(CentralStockAdjustmentService::class)->adjust($this->payload, $user))->toThrow(HttpException::class);
});

it('opens and saves a multi-variant adjustment from the listing', function () {
    $this->withoutVite();
    $this->manager->givePermissionTo(Permission::firstOrCreate(['name' => 'catalog.view', 'guard_name' => 'web']));
    $this->actingAs($this->manager);
    $page = Livewire::test(ListProductVariants::class)
        ->mountTableBulkAction('adjustStocks', $this->variants->all());
    foreach ($page->get('mountedActions.0.data.items') as $key => $item) {
        $page->set('mountedActions.0.data.items.'.$key.'.stock', $item['stock'] + 2);
    }
    $page->set('mountedActions.0.data.reason', $this->payload['reason'])->callMountedTableBulkAction()->assertHasNoErrors();
    expect($this->variants[0]->fresh()->stock)->toBe(12)->and(InventoryMovement::count())->toBe(2);
});

it('opens and saves a single adjustment without entering edit', function () {
    $this->withoutVite();
    $this->manager->givePermissionTo(Permission::firstOrCreate(['name' => 'catalog.view', 'guard_name' => 'web']));
    $this->actingAs($this->manager);
    $this->payload['items'] = [$this->payload['items'][0]];
    $page = Livewire::test(ListProductVariants::class)->mountTableAction('adjustStock', $this->variants[0]);
    foreach ($page->get('mountedActions.0.data.items') as $key => $item) {
        $page->set('mountedActions.0.data.items.'.$key.'.stock', $item['stock'] + 2);
    }
    $page->set('mountedActions.0.data.reason', $this->payload['reason'])->callMountedTableAction()->assertHasNoErrors();
    expect($this->variants[0]->fresh()->stock)->toBe(12)->and(InventoryMovement::count())->toBe(1);
});
