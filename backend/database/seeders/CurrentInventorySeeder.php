<?php

namespace Database\Seeders;

use App\Models\InventoryMovement;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use RuntimeException;

class CurrentInventorySeeder extends Seeder
{
    public function run(): void
    {
        $inventory = [
            'GR60' => ['ALMENDRA' => 7, 'ARANDANO' => 8, 'CAFE' => 1, 'MANI' => 2, 'NIBSDECA' => 1, 'PASAS' => 4, 'PECANA' => 3, 'CEREAL' => 2],
            'GR60-100' => ['ALMENDRA' => 1, 'ARANDANO' => 0, 'CAFE' => 1, 'MANI' => 1, 'NIBSDECA' => 1, 'PASAS' => 1, 'PECANA' => 0],
            'GR60-120' => ['ALMENDRA' => 3, 'ARANDANO' => 2, 'CAFE' => 2, 'MANI' => 0, 'NIBSDECA' => 3, 'PASAS' => 2, 'PECANA' => 0],
            'CH60' => ['AGUAYMAN' => 1, 'AJONJOLI' => 3, 'ARANDANO' => 5, 'BITTER' => 12, 'CAFE' => 9, 'COCORALL' => 9, 'KIWICHA' => 0, 'LECHE' => 3, 'MANI' => 1, 'NARANJA' => 5, 'NIBSDECA' => 0, 'PASAS' => 3, 'PECANA' => 6, 'QUINUA' => 4],
            'CH70' => ['AGUAYMAN' => 4, 'AJONJOLI' => 1, 'ARANDANO' => 10, 'BITTER' => 5, 'CAFE' => 4, 'COCORALL' => 10, 'KIWICHA' => 3, 'MANI' => 0, 'NARANJA' => 10, 'NIBSDECA' => 0, 'PASAS' => 3, 'PECANA' => 6, 'QUINUA' => 3, 'SALDEMAR' => 4],
            'CHP' => ['BITTER80' => 6, 'DARKESPE' => 11],
        ];
        $prices = ['GR60' => [450, 1000], 'GR60-100' => [800, 1800], 'GR60-120' => [1000, 2000], 'CH60' => [500, 1300], 'CH70' => [500, 1400], 'CHP' => [500, 1500]];

        foreach ($inventory as $prefix => $variants) {
            foreach ($variants as $suffix => $stock) {
                $this->updateVariant($prefix.'-'.$suffix, $stock, ...$prices[$prefix]);
            }
        }

        $singleProducts = [
            'OT-CAF-TM-250' => [11, 1500, 2500], 'OT-PAS-100-090' => [9, 500, 1700],
            'OT-POL-250' => [4, 1500, 2600], 'OT-NIB-250' => [0, 1500, 2600],
            'OT-GRA-250' => [2, 1500, 2400], 'OT-CAF-CAJ-250' => [10, 1500, 2600],
            'OT-CAF-AKI-250' => [0, 0, 3000],
        ];

        foreach ($singleProducts as $sku => [$stock, $cost, $price]) {
            $this->updateVariant($sku, $stock, $cost, $price);
        }

        ProductVariant::where('sku', 'GR60-100-CEREAL')->delete();
    }

    private function updateVariant(string $sku, int $stock, int $costAmount, int $priceAmount): void
    {
        $variant = ProductVariant::where('sku', $sku)->first();

        if (! $variant) {
            throw new RuntimeException("Inventory variant not found: {$sku}");
        }

        $variant->update(['stock' => $stock, 'cost_amount' => $costAmount, 'price_amount' => $priceAmount]);
        if ($stock > 0 && ! InventoryMovement::where('product_variant_id', $variant->id)->exists()) {
            InventoryMovement::create([
                'product_variant_id' => $variant->id,
                'type' => 'initial_stock',
                'quantity_delta' => $stock,
                'balance_after' => $stock,
                'reason' => 'Opening balance loaded from the development inventory seed.',
            ]);
        }
    }
}
