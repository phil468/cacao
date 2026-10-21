<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('draw_at')->nullable();
            $table->unsignedBigInteger('minimum_amount')->default(2000);
            $table->unsignedBigInteger('amount_per_code')->default(2000);
            $table->boolean('is_active')->default(false)->index();
            $table->text('terms_content')->nullable();
            $table->text('privacy_content')->nullable();
            $table->boolean('legal_reviewed')->default(false);
            $table->timestamps();
        });
        Schema::create('promo_code_batches', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->unsignedInteger('quantity');
            $table->string('status', 20)->default('active')->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->unique(['promotion_id', 'name']);
        });
        Schema::create('promo_participants', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->restrictOnDelete();
            $table->string('full_name', 120);
            $table->string('email');
            $table->string('phone', 30);
            $table->timestamp('terms_accepted_at');
            $table->boolean('marketing_consent')->default(false);
            $table->timestamp('marketing_consent_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 512)->nullable();
            $table->timestamps();
            $table->unique(['promotion_id', 'email']);
        });
        Schema::create('promo_codes', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->restrictOnDelete();
            $table->foreignId('batch_id')->nullable()->constrained('promo_code_batches')->restrictOnDelete();
            $table->string('code', 6)->unique();
            $table->string('type', 20)->default('physical');
            $table->string('status', 20)->default('available');
            $table->foreignId('order_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('participant_id')->nullable()->constrained('promo_participants')->restrictOnDelete();
            $table->timestamp('generated_at');
            $table->timestamp('registered_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->index(['promotion_id', 'status']);
            $table->index(['promotion_id', 'type']);
        });
        Schema::create('promotion_audit_logs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->restrictOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('event', 80);
            $table->json('context')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index(['promotion_id', 'event']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotion_audit_logs');
        Schema::dropIfExists('promo_codes');
        Schema::dropIfExists('promo_participants');
        Schema::dropIfExists('promo_code_batches');
        Schema::dropIfExists('promotions');
    }
};
