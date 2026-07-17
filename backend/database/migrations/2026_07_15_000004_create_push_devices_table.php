<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('push_devices', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('token', 512)->unique();
            $table->string('platform', 20);
            $table->boolean('order_updates_enabled')->default(true);
            $table->boolean('promotions_enabled')->default(false);
            $table->timestamp('last_seen_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('push_devices');
    }
};
