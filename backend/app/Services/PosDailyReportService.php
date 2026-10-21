<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PosDailyReportService
{
    /** @return array<string, mixed> */
    public function build(int $locationId, string $date, User $actor): array
    {
        $location = app(PosAccess::class)->location($actor, $locationId);
        abort_unless($actor->can('orders.manage'), 403);
        validator(['date' => $date], ['date' => 'required|date_format:Y-m-d|before_or_equal:'.now()->toDateString()])->validate();
        $orders = Order::where('sales_channel', 'pos')->where('inventory_location_id', $location->id)->whereRaw('DATE(COALESCE(sold_on, created_at)) = ?', [$date])->with('posPayments.paymentMethod', 'paymentMethod')->get();
        $methods = [];
        foreach ($orders as $order) {
            $payments = $order->posPayments->map(fn ($p): array => ['name' => $p->paymentMethod->name, 'amount' => $p->amount])->all();
            if ($payments === []) {
                $payments = [['name' => $order->paymentMethod->name, 'amount' => $order->total_amount]];
            }
            foreach ($payments as $payment) {
                $key = $payment['name'];
                $methods[$key] = ($methods[$key] ?? 0) + $payment['amount'];
            }
        }
        $shifts = DB::table('cash_shifts')->join('users', 'users.id', '=', 'cash_shifts.user_id')->where('inventory_location_id', $location->id)->whereDate('opened_at', $date)
            ->select('cash_shifts.*', 'users.name as cashier')->orderBy('cash_shifts.id')->get()->map(function ($row) {
                $row->closing_snapshot = $row->closing_snapshot ? json_decode($row->closing_snapshot, true, 512, JSON_THROW_ON_ERROR) : null;

                return $row;
            });
        $closing = DB::table('inventory_closings')->where('inventory_location_id', $location->id)->where('business_date', $date)->first();
        if ($closing) {
            $closing->snapshot = json_decode($closing->snapshot, true, 512, JSON_THROW_ON_ERROR);
        }

        return ['date' => $date, 'location' => $location->name,
            'sales_total' => (int) $orders->sum('total_amount'), 'discount_total' => (int) $orders->sum('discount_amount'), 'sales_count' => $orders->count(), 'payments' => $methods,
            'historical_total' => (int) $orders->where('is_historical', true)->sum('total_amount'), 'historical_count' => $orders->where('is_historical', true)->count(),
            'unassigned_sales_total' => (int) $orders->whereNull('cash_shift_id')->where('is_historical', false)->sum('total_amount'),
            'orders' => $orders->map(fn (Order $o): array => ['id' => $o->id, 'number' => $o->number, 'total' => $o->total_amount, 'historical' => $o->is_historical, 'registered_at' => $o->created_at->toDateTimeString(), 'cash_shift_id' => $o->cash_shift_id]),
            'shifts' => $shifts, 'inventory_closing' => $closing,
            'operations' => DB::table('inventory_operations')->where('inventory_location_id', $location->id)->whereDate('created_at', $date)->orderBy('id')->get()->map(function ($row) {
                $row->items = json_decode($row->items, true, 512, JSON_THROW_ON_ERROR);

                return $row;
            })];
    }
}
