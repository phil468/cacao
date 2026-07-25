<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payment_methods', function (Blueprint $table): void {
            $table->string('provider', 30)->default('manual')->after('code')->index();
        });
        Schema::table('orders', function (Blueprint $table): void {
            $table->string('billing_document_type', 10)->nullable()->after('customer_phone');
            $table->string('billing_document_number', 20)->nullable()->after('billing_document_type');
        });

        Schema::create('payment_transactions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('provider', 30);
            $table->string('transaction_id', 80)->unique();
            $table->string('provider_reference')->nullable()->index();
            $table->string('status', 30)->default('pending')->index();
            $table->unsignedBigInteger('amount');
            $table->string('currency', 3)->default('PEN');
            $table->json('response_payload')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
        Schema::table('orders', fn (Blueprint $table) => $table->dropColumn(['billing_document_type', 'billing_document_number']));
        Schema::table('payment_methods', fn (Blueprint $table) => $table->dropColumn('provider'));
    }
};
