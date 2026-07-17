<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table): void {
            $table->unsignedInteger('returned_quantity')->default(0)->after('quantity');
        });

        Schema::create('order_returns', function (Blueprint $table): void {
            $table->id();
            $table->uuid('number')->unique();
            $table->foreignId('order_id')->constrained()->restrictOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('reason');
            $table->timestamps();
        });

        Schema::create('order_return_items', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_return_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_item_id')->constrained()->restrictOnDelete();
            $table->unsignedInteger('quantity');
            $table->timestamps();
        });

        Schema::table('inventory_movements', function (Blueprint $table): void {
            $table->foreignId('order_return_id')->nullable()->after('order_id')->constrained()->nullOnDelete();
        });

        $now = now();
        DB::table('product_variants')
            ->where('stock', '>', 0)
            ->whereNotExists(function ($query): void {
                $query->selectRaw('1')
                    ->from('inventory_movements')
                    ->whereColumn('inventory_movements.product_variant_id', 'product_variants.id');
            })
            ->orderBy('id')
            ->each(function (object $variant) use ($now): void {
                DB::table('inventory_movements')->insert([
                    'product_variant_id' => $variant->id,
                    'type' => 'initial_stock',
                    'quantity_delta' => $variant->stock,
                    'balance_after' => $variant->stock,
                    'reason' => 'Opening balance registered during inventory audit adoption.',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            });
    }

    public function down(): void
    {
        Schema::table('inventory_movements', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('order_return_id');
        });
        Schema::dropIfExists('order_return_items');
        Schema::dropIfExists('order_returns');
        Schema::table('order_items', function (Blueprint $table): void {
            $table->dropColumn('returned_quantity');
        });
    }
};
