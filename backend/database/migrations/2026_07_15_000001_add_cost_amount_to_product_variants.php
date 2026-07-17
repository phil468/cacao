<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_variants', function (Blueprint $table): void {
            $table->unsignedBigInteger('cost_amount')->nullable()->after('weight_grams');
        });
    }

    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table): void {
            $table->dropColumn('cost_amount');
        });
    }
};
