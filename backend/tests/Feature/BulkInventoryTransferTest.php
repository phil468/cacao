<?php

use App\Filament\Resources\InventoryLocationResource\Pages\TransferInventory;
use App\Models\InventoryLocation;
use App\Models\InventoryMovement;
use App\Models\LocationStock;
use App\Models\PickupLocation;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Services\LocationInventoryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

beforeEach(function () {
    $this->withoutVite();
    $permission = Permission::firstOrCreate(['name' => 'inventory.manage', 'guard_name' => 'web']);
    $role = Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $role->givePermissionTo($permission);
    $this->manager = User::create(['name' => 'Stock manager', 'email' => 'stock-manager@example.test', 'password' => 'testing-password', 'is_active' => true]);
    $this->manager->assignRole($role);
    $this->actingAs($this->manager);
    $this->central = InventoryLocation::where('code', 'central')->firstOrFail();
    $pickup = PickupLocation::create(['name' => 'Test store', 'address_line' => 'Local', 'district' => 'Ica']);
    $this->point = InventoryLocation::create(['code' => 'bulk-point', 'name' => 'Test store', 'kind' => 'pos', 'pickup_location_id' => $pickup->id]);
    $product = Product::create(['name' => 'Chocolate', 'slug' => 'bulk-chocolate', 'is_active' => true]);
    $this->first = ProductVariant::create(['product_id' => $product->id, 'name' => '80 g', 'sku' => 'BULK-A', 'weight_grams' => 80, 'price_amount' => 2000, 'stock' => 10, 'is_active' => true]);
    $this->second = ProductVariant::create(['product_id' => $product->id, 'name' => '100 g', 'sku' => 'BULK-B', 'weight_grams' => 100, 'price_amount' => 2500, 'stock' => 6, 'is_active' => true]);
    $this->draft = ['submission_id' => (string) Str::uuid(), 'from_location_id' => $this->central->id, 'to_location_id' => $this->point->id, 'reason' => 'Abastecimiento semanal',
        'items' => [['variant_id' => $this->first->id, 'quantity' => 3], ['variant_id' => $this->second->id, 'quantity' => 2]]];
});

function bulkTransferPage(object $test): mixed
{
    return Livewire::test(TransferInventory::class, ['record' => $test->central->id])
        ->set('to_location_id', (string) $test->point->id)->set('reason', 'Abastecimiento semanal')
        ->set('quantities.'.$test->first->id, 3)->set('quantities.'.$test->second->id, 2);
}

it('reviews multiple products without reserving or moving any stock', function () {
    bulkTransferPage($this)->call('review')->assertHasNoErrors()->assertSet('reviewData.units', 5)->assertSet('reviewData.presentations', 2)
        ->assertSee('Resumen de la transferencia')->assertSee('Confirmar transferencia');
    expect($this->first->fresh()->stock)->toBe(10)->and($this->second->fresh()->stock)->toBe(6)
        ->and(DB::table('inventory_transfers')->count())->toBe(0)->and(InventoryMovement::count())->toBe(0)->and(LocationStock::count())->toBe(0);
});

it('confirms every selected row as one atomic transfer and ignores double confirmation', function () {
    $page = bulkTransferPage($this)->call('review')->call('confirm')->assertHasNoErrors();
    $id = $page->get('transferId');
    $page->call('confirm')->assertSet('transferId', $id)->assertSee('registrada');
    expect(DB::table('inventory_transfers')->count())->toBe(1)->and(DB::table('inventory_transfer_items')->count())->toBe(2)
        ->and(InventoryMovement::count())->toBe(4)->and($this->first->fresh()->stock)->toBe(7)->and($this->second->fresh()->stock)->toBe(4)
        ->and(LocationStock::sum('quantity'))->toBe(5);
});

it('retains selected quantities while searching and filtering the table', function () {
    bulkTransferPage($this)->set('search', 'BULK-B')->assertSeeHtml('aria-label="Cantidad BULK-B"')->assertDontSeeHtml('aria-label="Cantidad BULK-A"')
        ->assertSet('quantities.'.$this->first->id, 3)->set('search', '')->set('selectedOnly', true)->call('review')->assertSet('reviewData.presentations', 2);
});

it('requires a nonempty selection and never confirms before review', function () {
    Livewire::test(TransferInventory::class, ['record' => $this->central->id])->call('confirm')->assertHasErrors('transfer')
        ->set('to_location_id', (string) $this->point->id)->set('reason', 'Abastecimiento')->call('review')->assertHasErrors('items');
    expect(DB::table('inventory_transfers')->count())->toBe(0);
});

it('rejects invalid quantities without moving stock', function (mixed $quantity) {
    bulkTransferPage($this)->set('quantities.'.$this->first->id, $quantity)->call('review')->assertHasErrors('quantities.'.$this->first->id);
    expect(DB::table('inventory_transfers')->count())->toBe(0);
})->with([-1, 1.5, 'not-a-number', 100001]);

it('rejects the origin as destination and inactive destinations', function () {
    $page = bulkTransferPage($this)->set('to_location_id', (string) $this->central->id)->call('review')->assertHasErrors('to_location_id');
    $this->point->update(['is_active' => false]);
    $page->set('to_location_id', (string) $this->point->id)->call('review')->assertHasErrors('location');
    expect(DB::table('inventory_transfers')->count())->toBe(0);
});

it('rechecks all stock after review and rolls back earlier rows on a late shortage', function () {
    $page = bulkTransferPage($this)->call('review');
    $this->second->update(['stock' => 0]);
    $page->call('confirm')->assertHasErrors('transfer')->assertSet('transferId', null)->assertSee('No se transfirió ningún producto.');
    expect($this->first->fresh()->stock)->toBe(10)->and(DB::table('inventory_transfers')->count())->toBe(0)
        ->and(DB::table('inventory_transfer_items')->count())->toBe(0)->and(InventoryMovement::count())->toBe(0)->and(LocationStock::count())->toBe(0);
    $page->call('back')->assertSet('reviewData', [])->assertSet('quantities.'.$this->first->id, 3);
});

it('uses the locked reviewed payload rather than public editable fields at confirmation', function () {
    bulkTransferPage($this)->call('review')->set('quantities.'.$this->first->id, 9)->set('reason', 'Tampered reason')
        ->set('to_location_id', (string) $this->central->id)->call('confirm')->assertHasNoErrors();
    expect($this->first->fresh()->stock)->toBe(7)->and(DB::table('inventory_transfers')->value('reason'))->toBe('Abastecimiento semanal')
        ->and(DB::table('inventory_transfers')->value('to_location_id'))->toBe($this->point->id);
});

it('prevents client tampering with the server reviewed summary', function () {
    expect(fn () => bulkTransferPage($this)->call('review')->set('reviewData.payload.items.0.quantity', 9))
        ->toThrow(CannotUpdateLockedPropertyException::class);
});

it('rejects revoked access even after review', function () {
    $page = bulkTransferPage($this)->call('review');
    $this->manager->update(['is_active' => false]);
    $page->call('confirm')->assertForbidden();
    expect(DB::table('inventory_transfers')->count())->toBe(0);
});

it('denies unprivileged users direct access to the transfer page', function () {
    $customer = User::create(['name' => 'Customer', 'email' => 'bulk-customer@example.test', 'password' => 'testing-password', 'is_active' => true]);
    $this->actingAs($customer)->get('/admin/inventory-locations/'.$this->central->id.'/transfer')->assertForbidden();
});

it('keeps one transfer on identical retries but rejects a changed payload with the same UUID', function () {
    $service = app(LocationInventoryService::class);
    $id = $service->transfer($this->draft, $this->manager);
    $retry = $this->draft;
    $retry['items'] = array_reverse($retry['items']);
    expect($service->transfer($retry, $this->manager))->toBe($id);
    $retry['items'][0]['quantity'] = 1;
    expect(fn () => $service->transfer($retry, $this->manager))->toThrow(ConflictHttpException::class);
    expect(DB::table('inventory_transfers')->count())->toBe(1)->and($this->first->fresh()->stock)->toBe(7);
});

it('returns stock from a point to central using the same bulk workflow', function () {
    app(LocationInventoryService::class)->transfer($this->draft, $this->manager);
    Livewire::test(TransferInventory::class, ['record' => $this->point->id])->set('to_location_id', (string) $this->central->id)->set('reason', 'Retorno al almacén')
        ->set('quantities.'.$this->first->id, 2)->set('quantities.'.$this->second->id, 1)->call('review')->call('confirm')->assertHasNoErrors();
    expect($this->first->fresh()->stock)->toBe(9)->and($this->second->fresh()->stock)->toBe(5)->and(LocationStock::sum('quantity'))->toBe(2);
});
