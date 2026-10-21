<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_locations', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('kind', 20)->default('pos');
            $table->foreignId('pickup_location_id')->nullable()->unique()->constrained()->restrictOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        $central = DB::table('inventory_locations')->insertGetId(['code' => 'central', 'name' => 'Almacén central', 'kind' => 'central', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        // Existing variant.stock is now the central balance. Do not copy it into another balance table.
        foreach (DB::table('pickup_locations')->whereNull('deleted_at')->get() as $point) {
            DB::table('inventory_locations')->insert(['code' => 'pos-'.$point->id, 'name' => $point->name, 'kind' => 'pos', 'pickup_location_id' => $point->id, 'is_active' => $point->is_active, 'created_at' => now(), 'updated_at' => now()]);
        }
        Schema::create('location_stocks', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $table->foreignId('product_variant_id')->constrained()->restrictOnDelete();
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();
            $table->unique(['inventory_location_id', 'product_variant_id']);
        });
        Schema::create('inventory_location_user', function (Blueprint $table): void {
            $table->foreignId('inventory_location_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->primary(['inventory_location_id', 'user_id']);
        });
        Schema::create('inventory_transfers', function (Blueprint $table): void {
            $table->id();
            $table->uuid('submission_id')->unique();
            $table->foreignId('from_location_id')->constrained('inventory_locations')->restrictOnDelete();
            $table->foreignId('to_location_id')->constrained('inventory_locations')->restrictOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reason', 500);
            $table->timestamps();
        });
        Schema::create('inventory_transfer_items', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('inventory_transfer_id')->constrained()->restrictOnDelete();
            $table->foreignId('product_variant_id')->constrained()->restrictOnDelete();
            $table->unsignedInteger('quantity');
        });
        Schema::table('orders', function (Blueprint $table): void {
            $table->foreignId('inventory_location_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('payment_proof_disk', 20)->default('public');
        });
        Schema::table('inventory_movements', function (Blueprint $table): void {
            $table->foreignId('inventory_location_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('inventory_transfer_id')->nullable()->constrained()->restrictOnDelete();
        });
        // Historical sales all consumed the former global balance, regardless of pickup location.
        DB::table('orders')->update(['inventory_location_id' => $central]);
        DB::table('inventory_movements')->update(['inventory_location_id' => $central]);
        Schema::table('product_variants', fn (Blueprint $table) => $table->string('barcode', 100)->nullable()->unique());
        Schema::table('promo_codes', function (Blueprint $table): void {
            // Legacy codes retain registration eligibility; newly generated codes require handover.
            $table->string('activation_mode', 20)->default('legacy');
            $table->timestamp('activated_at')->nullable();
            $table->foreignId('activated_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if (DB::table('location_stocks')->where('quantity', '>', 0)->exists() || DB::table('inventory_transfers')->exists()) {
            throw new RuntimeException('Refusing to drop populated location inventory. Reconcile balances and use an operational rollback instead.');
        }
        Schema::table('promo_codes', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('activated_by');
            $table->dropColumn(['activation_mode', 'activated_at']);
        });
        Schema::table('product_variants', function (Blueprint $table): void {
            $table->dropUnique(['barcode']);
            $table->dropColumn('barcode');
        });
        Schema::table('inventory_movements', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('inventory_location_id');
            $table->dropConstrainedForeignId('inventory_transfer_id');
        });
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('inventory_location_id');
            $table->dropColumn('payment_proof_disk');
        });
        Schema::dropIfExists('inventory_transfer_items');
        Schema::dropIfExists('inventory_transfers');
        Schema::dropIfExists('inventory_location_user');
        Schema::dropIfExists('location_stocks');
        Schema::dropIfExists('inventory_locations');
    }
};
