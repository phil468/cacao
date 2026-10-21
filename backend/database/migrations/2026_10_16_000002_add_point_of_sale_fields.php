<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->string('sales_channel', 10)->default('web')->index();
            $table->foreignId('cashier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('sale_reference', 80)->nullable()->index();
            $table->uuid('pos_submission_id')->nullable()->unique();
            $table->timestamp('payment_confirmed_at')->nullable();
        });
        Schema::table('payment_methods', fn (Blueprint $table) => $table->boolean('is_available_online')->default(true));
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('cashier_id');
            $table->dropColumn(['sales_channel', 'sale_reference', 'pos_submission_id', 'payment_confirmed_at']);
        });
        Schema::table('payment_methods', fn (Blueprint $table) => $table->dropColumn('is_available_online'));
    }
};
