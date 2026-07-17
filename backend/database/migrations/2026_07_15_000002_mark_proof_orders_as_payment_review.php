<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $pendingId = DB::table('order_statuses')->where('code', 'pending_payment')->value('id');
        $reviewId = DB::table('order_statuses')->where('code', 'payment_review')->value('id');
        if (! $pendingId || ! $reviewId) {
            return;
        }

        $orderIds = DB::table('orders')->where('order_status_id', $pendingId)->whereNotNull('payment_proof_path')->pluck('id');
        DB::table('orders')->whereIn('id', $orderIds)->update(['order_status_id' => $reviewId, 'updated_at' => now()]);
        foreach ($orderIds as $orderId) {
            DB::table('order_status_histories')->insert(['order_id' => $orderId, 'order_status_id' => $reviewId, 'actor_id' => null, 'note' => 'Constancia recibida; pago pendiente de revisión.', 'created_at' => now(), 'updated_at' => now()]);
        }
    }

    public function down(): void {}
};
