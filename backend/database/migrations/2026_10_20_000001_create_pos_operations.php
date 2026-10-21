<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->createOnce('cash_shifts', function (Blueprint $t): void {
            $t->id();
            $t->uuid('submission_id')->unique();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('user_id')->constrained()->restrictOnDelete();
            $t->unsignedBigInteger('active_location_id')->nullable()->unique();
            $t->unsignedBigInteger('active_user_id')->nullable()->unique();
            $t->unsignedBigInteger('opening_cash');
            $t->timestamp('opened_at');
            $t->timestamp('closed_at')->nullable();
            $t->json('closing_snapshot')->nullable();
            $t->timestamps();
        });
        Schema::table('orders', function (Blueprint $t): void {
            if (! Schema::hasColumn('orders', 'sold_on')) {
                $t->date('sold_on')->nullable()->index();
            }
            if (! Schema::hasColumn('orders', 'is_historical')) {
                $t->boolean('is_historical')->default(false);
            }
            if (! Schema::hasColumn('orders', 'historical_reason')) {
                $t->text('historical_reason')->nullable();
            }
            if (! Schema::hasColumn('orders', 'cash_shift_id')) {
                $t->foreignId('cash_shift_id')->nullable()->constrained()->restrictOnDelete();
            }
        });
        $this->createOnce('cash_entries', function (Blueprint $t): void {
            $t->id();
            $t->uuid('submission_id')->unique();
            $t->foreignId('cash_shift_id')->constrained()->restrictOnDelete();
            $t->foreignId('actor_id')->constrained('users')->restrictOnDelete();
            $t->foreignId('payment_method_id')->constrained()->restrictOnDelete();
            $t->foreignId('order_id')->nullable()->constrained()->restrictOnDelete();
            $t->string('kind', 20);
            $t->unsignedBigInteger('amount');
            $t->text('reason');
            $t->timestamps();
        });
        $this->createOnce('inventory_operations', function (Blueprint $t): void {
            $t->id();
            $t->uuid('submission_id')->unique();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('actor_id')->constrained('users')->restrictOnDelete();
            $t->string('kind', 30);
            $t->text('reason');
            $t->json('items');
            $t->string('payload_hash', 64);
            $t->timestamps();
        });
        $this->createOnce('quarantine_stocks', function (Blueprint $t): void {
            $t->id();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('product_variant_id')->constrained()->restrictOnDelete();
            $t->unsignedInteger('quantity')->default(0);
            $t->timestamps();
            $t->unique(['inventory_location_id', 'product_variant_id'], 'quarantine_location_variant_unique');
        });
        // MySQL DDL can survive a failed migration; complete an empty partial table
        // without dropping it or rewriting any business records.
        if (! Schema::hasIndex('quarantine_stocks', 'quarantine_location_variant_unique')) {
            Schema::table('quarantine_stocks', fn (Blueprint $t) => $t->unique(['inventory_location_id', 'product_variant_id'], 'quarantine_location_variant_unique'));
        }
        foreach (['inventory_location_id' => 'inventory_locations', 'product_variant_id' => 'product_variants'] as $column => $parent) {
            $hasForeign = collect(Schema::getForeignKeys('quarantine_stocks'))->contains(fn (array $key): bool => $key['columns'] === [$column]);
            if (! $hasForeign) {
                Schema::table('quarantine_stocks', fn (Blueprint $t) => $t->foreign($column)->references('id')->on($parent)->restrictOnDelete());
            }
        }
        Schema::table('inventory_movements', function (Blueprint $t): void {
            if (! Schema::hasColumn('inventory_movements', 'quarantine_delta')) {
                $t->integer('quarantine_delta')->default(0);
            }
            if (! Schema::hasColumn('inventory_movements', 'inventory_operation_id')) {
                $t->foreignId('inventory_operation_id')->nullable()->constrained()->restrictOnDelete();
            }
        });
        if (! Schema::hasColumn('order_returns', 'inventory_disposition')) {
            Schema::table('order_returns', fn (Blueprint $t) => $t->string('inventory_disposition')->default('available'));
        }
        $this->createOnce('inventory_closings', function (Blueprint $t): void {
            $t->id();
            $t->uuid('submission_id')->unique();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('actor_id')->constrained('users')->restrictOnDelete();
            $t->date('business_date');
            $t->timestamp('closed_at');
            $t->json('snapshot');
            $t->text('reason');
            $t->timestamps();
            $t->unique(['inventory_location_id', 'business_date']);
        });
        $this->createOnce('replenishment_settings', function (Blueprint $t): void {
            $t->id();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('product_variant_id')->constrained()->restrictOnDelete();
            $t->unsignedInteger('minimum_quantity');
            $t->unsignedInteger('target_quantity');
            $t->timestamps();
            $t->unique(['inventory_location_id', 'product_variant_id'], 'replenishment_location_variant_unique');
        });
        $this->createOnce('replenishment_requests', function (Blueprint $t): void {
            $t->id();
            $t->uuid('submission_id')->unique();
            $t->foreignId('inventory_location_id')->constrained()->restrictOnDelete();
            $t->foreignId('actor_id')->constrained('users')->restrictOnDelete();
            $t->string('status')->default('pending');
            $t->json('items');
            $t->text('reason');
            $t->foreignId('inventory_transfer_id')->nullable()->constrained()->restrictOnDelete();
            $t->timestamps();
        });
    }

    private function createOnce(string $table, Closure $definition): void
    {
        if (! Schema::hasTable($table)) {
            Schema::create($table, $definition);
        }
    }

    public function down(): void
    {
        foreach (['cash_shifts', 'cash_entries', 'inventory_operations', 'quarantine_stocks', 'inventory_closings', 'replenishment_requests', 'replenishment_settings'] as $table) {
            if (DB::table($table)->exists()) {
                throw new RuntimeException('Reconcile POS operational records before rolling back.');
            }
        }
        if (DB::table('orders')->where('is_historical', true)->orWhereNotNull('cash_shift_id')->orWhereNotNull('sold_on')->exists()) {
            throw new RuntimeException('Do not remove historical sale or shift metadata from existing orders.');
        }
        Schema::dropIfExists('replenishment_requests');
        Schema::dropIfExists('replenishment_settings');
        Schema::dropIfExists('inventory_closings');
        Schema::table('order_returns', fn (Blueprint $t) => $t->dropColumn('inventory_disposition'));
        Schema::table('inventory_movements', function (Blueprint $t): void {
            $t->dropConstrainedForeignId('inventory_operation_id');
            $t->dropColumn('quarantine_delta');
        });
        Schema::dropIfExists('quarantine_stocks');
        Schema::dropIfExists('inventory_operations');
        Schema::dropIfExists('cash_entries');
        Schema::table('orders', function (Blueprint $t): void {
            $t->dropIndex(['sold_on']);
            $t->dropConstrainedForeignId('cash_shift_id');
            $t->dropColumn(['sold_on', 'is_historical', 'historical_reason']);
        });
        Schema::dropIfExists('cash_shifts');
    }
};
