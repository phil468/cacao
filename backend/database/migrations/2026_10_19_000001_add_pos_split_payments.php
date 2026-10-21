<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->string('pos_discount_type')->nullable();
            $table->unsignedInteger('pos_discount_basis_points')->nullable();
        });
        Schema::create('order_payments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payment_method_id')->constrained()->restrictOnDelete();
            $table->unsignedInteger('amount');
            $table->string('proof_path')->nullable();
            $table->boolean('proof_missing')->default(false);
            $table->timestamps();
            $table->unique(['order_id', 'payment_method_id']);
        });
    }

    public function down(): void
    {
        if (DB::table('order_payments')->exists()) {
            throw new RuntimeException('Reconcile payment records before rolling back this migration.');
        }
        Schema::dropIfExists('order_payments');
        Schema::table('orders', fn (Blueprint $table) => $table->dropColumn(['pos_discount_type', 'pos_discount_basis_points']));
    }
};
