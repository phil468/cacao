<?php

namespace App\Filament\Resources\ProductVariantResource\Pages;

use App\Filament\Resources\ProductVariantResource;
use App\Models\InventoryMovement;
use App\Models\ProductVariant;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use LogicException;

class EditProductVariant extends EditRecord
{
    protected static string $resource = ProductVariantResource::class;

    /** @param array<string, mixed> $data */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (! $record instanceof ProductVariant) {
            throw new LogicException('The variant resource received an invalid record.');
        }

        return DB::transaction(function () use ($record, $data): ProductVariant {
            $locked = ProductVariant::lockForUpdate()->findOrFail($record->id);
            $previousStock = $locked->stock;
            $newStock = (int) $data['stock'];
            $reason = trim((string) ($data['adjustment_reason'] ?? ''));
            unset($data['adjustment_reason']);

            if ($newStock !== $previousStock && $reason === '') {
                throw ValidationException::withMessages(['adjustment_reason' => 'Indica el motivo del ajuste de stock.']);
            }

            $locked->update($data);
            if ($newStock !== $previousStock) {
                InventoryMovement::create([
                    'product_variant_id' => $locked->id,
                    'actor_id' => Auth::id(),
                    'type' => 'manual_adjustment',
                    'quantity_delta' => $newStock - $previousStock,
                    'balance_after' => $newStock,
                    'reason' => $reason,
                ]);
            }

            return $locked->refresh();
        }, 5);
    }
}
