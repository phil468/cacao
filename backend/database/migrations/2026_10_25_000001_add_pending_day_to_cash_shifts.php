<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cash_shifts', function (Blueprint $table): void {
            $table->date('business_date')->nullable()->index();
            $table->text('pending_day_reason')->nullable();
        });
    }

    public function down(): void
    {
        if (DB::table('cash_shifts')->whereNotNull('pending_day_reason')->exists()) {
            throw new RuntimeException('Reconcile pending-day shifts before removing their audit fields.');
        }
        Schema::table('cash_shifts', fn (Blueprint $table) => $table->dropColumn(['business_date', 'pending_day_reason']));
    }
};
