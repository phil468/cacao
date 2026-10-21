<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PointOfSaleSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::firstOrCreate(['code' => 'pos_cash'], [
            'name' => 'Efectivo (presencial)', 'provider' => 'manual', 'requires_proof' => false,
            'is_active' => true, 'is_available_online' => false,
        ]);
    }
}
