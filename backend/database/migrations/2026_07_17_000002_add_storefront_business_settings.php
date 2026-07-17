<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('business_settings')->insertOrIgnore([
            'key' => 'business.storefront',
            'value' => json_encode(['carousel_interval_seconds' => 7]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('business_settings')->where('key', 'business.storefront')->delete();
    }
};
