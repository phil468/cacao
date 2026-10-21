<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['cash_received_amount', 'change_amount'] as $column) {
            if (! Schema::hasColumn('order_payments', $column)) {
                Schema::table('order_payments', fn (Blueprint $table) => $table->unsignedInteger($column)->nullable());
            }
        }
    }

    public function down(): void
    {
        if (DB::table('order_payments')->whereNotNull('cash_received_amount')->orWhereNotNull('change_amount')->exists()) {
            throw new RuntimeException('Cannot discard recorded cash received and change.');
        }
        Schema::table('order_payments', fn (Blueprint $table) => $table->dropColumn(['cash_received_amount', 'change_amount']));
    }
};
