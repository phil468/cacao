<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('promotions', fn (Blueprint $table) => $table->boolean('retention_hold')->default(false));
        Schema::table('promo_participants', fn (Blueprint $table) => $table->timestamp('anonymized_at')->nullable());
    }

    public function down(): void
    {
        Schema::table('promo_participants', fn (Blueprint $table) => $table->dropColumn('anonymized_at'));
        Schema::table('promotions', fn (Blueprint $table) => $table->dropColumn('retention_hold'));
    }
};
