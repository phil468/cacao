<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('orders')->orderBy('id')->each(function (object $order): void {
            $lastStatusId = DB::table('order_status_histories')
                ->where('order_id', $order->id)
                ->latest('id')
                ->value('order_status_id');

            if ((int) $lastStatusId === (int) $order->order_status_id) {
                return;
            }

            DB::table('order_status_histories')->insert([
                'order_id' => $order->id,
                'order_status_id' => $order->order_status_id,
                'actor_id' => null,
                'note' => 'Estado actual reconciliado por actualización del sistema.',
                'created_at' => $order->updated_at ?? now(),
                'updated_at' => now(),
            ]);
        });
    }

    public function down(): void
    {
        DB::table('order_status_histories')
            ->where('note', 'Estado actual reconciliado por actualización del sistema.')
            ->delete();
    }
};
