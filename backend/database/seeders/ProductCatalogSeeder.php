<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $dragees = Category::updateOrCreate(['slug' => 'grageas'], ['name' => 'Grageas', 'description' => 'Grageas cubiertas con chocolate peruano.', 'is_active' => true]);
        $chocolates = Category::updateOrCreate(['slug' => 'chocolates'], ['name' => 'Chocolates', 'description' => 'Barras de chocolate peruano con inclusiones seleccionadas.', 'is_active' => true]);
        $others = Category::updateOrCreate(['slug' => 'otros-productos'], ['name' => 'Otros productos', 'description' => 'Cacao, café y complementos de origen peruano.', 'is_active' => true]);

        $drageeFlavors = ['Almendra', 'Arándano', 'Café', 'Maní', 'Nibs de cacao', 'Pasas', 'Pecana', 'Cereal'];
        $this->seedFlavorProduct($dragees, 'Grageas 60% 50 g', 'GR60', 50, 60, 2490, $drageeFlavors, true);
        $this->seedFlavorProduct($dragees, 'Grageas 60% 100 g', 'GR60-100', 100, 60, 2490, array_values(array_diff($drageeFlavors, ['Cereal'])));
        $this->seedFlavorProduct($dragees, 'Grageas 60% 120 g', 'GR60-120', 120, 60, 2890, array_values(array_diff($drageeFlavors, ['Cereal'])));

        $flavors60 = ['Aguaymanto', 'Ajonjolí', 'Arándano', 'Bitter', 'Café', 'Coco rallado', 'Kiwicha', 'Leche', 'Maní', 'Naranja', 'Nibs de cacao', 'Pasas', 'Pecana', 'Quinua'];
        $flavors70 = ['Aguaymanto', 'Ajonjolí', 'Arándano', 'Bitter', 'Café', 'Coco rallado', 'Kiwicha', 'Maní', 'Naranja', 'Nibs de cacao', 'Pasas', 'Pecana', 'Quinua', 'Sal de Maras'];
        $this->seedFlavorProduct($chocolates, 'Chocolate 60%', 'CH60', 45, 60, 1990, $flavors60, true);
        $this->seedFlavorProduct($chocolates, 'Chocolate 70%', 'CH70', 45, 70, 2190, $flavors70, true);
        $this->seedFlavorProduct($chocolates, 'Chocolate Premium', 'CHP', 45, null, 2790, ['Bitter 80%', 'Dark Especial'], true);
        ProductVariant::where('sku', 'CHP-DARKESPE')->update(['cacao_percentage' => 70, 'weight_grams' => 50]);

        $this->seedSingleProduct($others, 'Café tueste medio 250 g', 'OT-CAF-TM-250', 250, 2890);
        $this->seedSingleProduct($others, 'Pasta de cacao 100% 90 g', 'OT-PAS-100-090', 90, 2290, 100);
        $this->seedSingleProduct($others, 'Polvo de cacao 250 g', 'OT-POL-250', 250, 2490);
        $this->seedSingleProduct($others, 'Nibs de cacao 250 g', 'OT-NIB-250', 250, 2690);
        $this->seedSingleProduct($others, 'Granos de café tostado 250 g', 'OT-GRA-250', 250, 2890);
        $this->seedSingleProduct($others, 'Café tueste medio en caja 250 g', 'OT-CAF-CAJ-250', 250, 3290);
        $this->seedSingleProduct($others, 'Café Akimi 250 g', 'OT-CAF-AKI-250', 250, 3290);
    }

    /** @param array<int, string> $flavors */
    private function seedFlavorProduct(Category $category, string $name, string $skuPrefix, int $weight, ?int $cacaoPercentage, int $priceAmount, array $flavors, bool $featured = false): void
    {
        $product = Product::updateOrCreate(['slug' => Str::slug($name)], ['category_id' => $category->id, 'name' => $name, 'short_description' => 'Chocolate peruano con sabores cuidadosamente seleccionados.', 'description' => 'Una colección elegante elaborada con cacao peruano y combinaciones para distintos momentos.', 'is_active' => true, 'is_featured' => $featured]);
        foreach ($flavors as $flavor) {
            ProductVariant::updateOrCreate(['sku' => $skuPrefix.'-'.Str::upper(Str::substr(Str::slug($flavor, ''), 0, 8))], ['product_id' => $product->id, 'name' => $flavor, 'cacao_percentage' => $cacaoPercentage, 'weight_grams' => $weight, 'price_amount' => $priceAmount, 'stock' => 20, 'low_stock_threshold' => 5, 'is_active' => true]);
        }
    }

    private function seedSingleProduct(Category $category, string $name, string $sku, int $weight, int $priceAmount, ?int $cacaoPercentage = null): void
    {
        $product = Product::updateOrCreate(['slug' => Str::slug($name)], ['category_id' => $category->id, 'name' => $name, 'short_description' => 'Producto peruano seleccionado por su calidad y origen.', 'description' => 'Una presentación cuidada para disfrutar o regalar.', 'is_active' => true, 'is_featured' => false]);
        ProductVariant::updateOrCreate(['sku' => $sku], ['product_id' => $product->id, 'name' => 'Presentación única', 'cacao_percentage' => $cacaoPercentage, 'weight_grams' => $weight, 'price_amount' => $priceAmount, 'stock' => 20, 'low_stock_threshold' => 5, 'is_active' => true]);
    }
}
