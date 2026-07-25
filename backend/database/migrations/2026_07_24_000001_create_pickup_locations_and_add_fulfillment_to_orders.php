<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pickup_locations', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('address_line');
            $table->string('reference')->nullable();
            $table->string('district', 100);
            $table->string('province', 100)->default('Ica');
            $table->string('department', 100)->default('Ica');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->text('instructions')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('orders', function (Blueprint $table): void {
            $table->string('fulfillment_type', 20)->default('delivery')->after('customer_phone');
            $table->foreignId('pickup_location_id')->nullable()->after('fulfillment_type')->constrained()->nullOnDelete();
            $table->json('pickup_location_snapshot')->nullable()->after('delivery_address');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('pickup_location_id');
            $table->dropColumn(['fulfillment_type', 'pickup_location_snapshot']);
        });

        Schema::dropIfExists('pickup_locations');
    }
};
