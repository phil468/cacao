<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('push_campaigns', function (Blueprint $table): void {
            $table->id();
            $table->string('title', 120);
            $table->text('body');
            $table->string('route')->default('/catalog');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });

        Schema::create('notification_deliveries', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('push_campaign_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('event', 100);
            $table->string('channel', 20);
            $table->string('destination', 512)->nullable();
            $table->string('provider_message_id')->nullable();
            $table->string('status', 20)->default('pending');
            $table->text('error')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
            $table->unique(['order_id', 'event', 'channel']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_deliveries');
        Schema::dropIfExists('push_campaigns');
    }
};
