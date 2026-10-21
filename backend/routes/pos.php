<?php

use App\Http\Controllers\PosController;
use App\Http\Controllers\PosOperationsController;
use App\Http\Middleware\EnsurePosAccess;
use Illuminate\Support\Facades\Route;

Route::view('/pos', 'pos.shell')->name('pos');
Route::prefix('pos/api')->group(function (): void {
    Route::get('session', [PosController::class, 'session']);
    Route::post('login', [PosController::class, 'login'])->middleware('throttle:6,1');
    Route::middleware(['auth', EnsurePosAccess::class])->group(function (): void {
        Route::post('logout', [PosController::class, 'logout']);
        Route::get('catalog', [PosController::class, 'catalog'])->middleware('throttle:120,1');
        Route::post('proofs', [PosController::class, 'uploadProof'])->middleware('throttle:20,1');
        Route::post('sales', [PosController::class, 'sell'])->middleware('throttle:60,1');
        Route::post('sales/{order}/codes', [PosController::class, 'handover'])->middleware('throttle:60,1');
        Route::get('sales/{order}/proof', [PosController::class, 'proof']);
        Route::get('operations', [PosOperationsController::class, 'state']);
        Route::get('operations/report', [PosOperationsController::class, 'report']);
        Route::post('operations/shifts', [PosOperationsController::class, 'open']);
        Route::post('operations/shifts/{shift}/close', [PosOperationsController::class, 'close'])->whereNumber('shift');
        Route::post('operations/shifts/{shift}/entries', [PosOperationsController::class, 'entry'])->whereNumber('shift');
        Route::post('operations/stock', [PosOperationsController::class, 'stockOperation']);
        Route::post('operations/inventory-close', [PosOperationsController::class, 'inventoryClose']);
        Route::post('operations/settings', [PosOperationsController::class, 'settings']);
        Route::post('operations/requests', [PosOperationsController::class, 'replenishment']);
        Route::post('operations/requests/{replenishment}/fulfill', [PosOperationsController::class, 'fulfill'])->whereNumber('replenishment');
    });
});
