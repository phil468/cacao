<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transfer_receipt_confirmations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('inventory_transfer_id')->unique()->constrained()->restrictOnDelete();
            $table->date('received_on');
            $table->foreignId('actor_id')->constrained('users')->restrictOnDelete();
            $table->text('reason');
            $table->timestamp('confirmed_at');
        });
    }

    public function down(): void
    {
        if (DB::table('transfer_receipt_confirmations')->exists()) {
            throw new RuntimeException('Preserve audited receipt confirmations before rolling back.');
        }
        Schema::dropIfExists('transfer_receipt_confirmations');
    }
};
