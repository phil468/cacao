<?php

namespace App\Filament\Resources\ProductVariantResource\Pages;

use App\Filament\Resources\ProductVariantResource;
use App\Models\InventoryMovement;
use App\Models\ProductVariant;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateProductVariant extends CreateRecord
{
    protected static string $resource = ProductVariantResource::class;

    /** @param array<string, mixed> $data */
    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data): ProductVariant {
            $variant = ProductVariant::create($data);
            if ($variant->stock > 0) {
                InventoryMovement::create([
                    'product_variant_id' => $variant->id,
                    'actor_id' => Auth::id(),
                    'type' => 'initial_stock',
                    'quantity_delta' => $variant->stock,
                    'balance_after' => $variant->stock,
                    'reason' => 'Opening stock registered when the variant was created.',
                ]);
            }

            return $variant;
        }, 5);
    }
}
