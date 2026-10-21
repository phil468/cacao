<?php

namespace App\Http\Controllers;

use App\Services\CashShiftService;
use App\Services\PosAccess;
use App\Services\PosDailyReportService;
use App\Services\PosInventoryOperationsService;
use App\Services\ReplenishmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosOperationsController extends Controller
{
    public function state(Request $request, PosAccess $access, PosInventoryOperationsService $inventory, CashShiftService $cash): JsonResponse
    {
        $data = $request->validate(['location_id' => 'required|integer']);
        $location = $access->location($request->user(), (int) $data['location_id']);
        $shift = DB::table('cash_shifts')->where('active_location_id', $location->id)->first();
        $requests = DB::table('replenishment_requests')->where('inventory_location_id', $location->id)->orderByDesc('id')->limit(50)->get()->map(function ($row) {
            $row->items = json_decode($row->items, true, 512, JSON_THROW_ON_ERROR);

            return $row;
        });

        return response()->json(['today' => now()->toDateString(), 'inventory' => $inventory->rows($location), 'requests' => $requests,
            'shift' => $shift && ((int) $shift->user_id === $request->user()->id || $request->user()->can('orders.manage')) ? $cash->summary((int) $shift->id, $request->user()) : null,
            'other_shift_open' => $shift !== null && (int) $shift->user_id !== $request->user()->id,
            'day_closed' => DB::table('inventory_closings')->where('inventory_location_id', $location->id)->where('business_date', now()->toDateString())->exists()]);
    }

    public function open(Request $request, CashShiftService $cash): JsonResponse
    {
        return response()->json(['id' => $cash->open($request->all(), $request->user())], 201);
    }

    public function close(Request $request, int $shift, CashShiftService $cash): JsonResponse
    {
        return response()->json($cash->close($shift, $request->all(), $request->user()));
    }

    public function entry(Request $request, int $shift, CashShiftService $cash): JsonResponse
    {
        return response()->json(['id' => $cash->entry($shift, $request->all(), $request->user())], 201);
    }

    public function stockOperation(Request $request, PosInventoryOperationsService $inventory): JsonResponse
    {
        return response()->json(['id' => $inventory->record($request->all(), $request->user())], 201);
    }

    public function inventoryClose(Request $request, PosInventoryOperationsService $inventory): JsonResponse
    {
        return response()->json(['id' => $inventory->close($request->all(), $request->user())], 201);
    }

    public function settings(Request $request, ReplenishmentService $service): JsonResponse
    {
        $service->settings($request->all(), $request->user());

        return response()->json(['message' => 'Mínimos y objetivos guardados.']);
    }

    public function replenishment(Request $request, ReplenishmentService $service): JsonResponse
    {
        return response()->json(['id' => $service->request($request->all(), $request->user())], 201);
    }

    public function fulfill(Request $request, int $replenishment, ReplenishmentService $service): JsonResponse
    {
        return response()->json(['transfer_id' => $service->fulfill($replenishment, $request->user())]);
    }

    public function report(Request $request, PosAccess $access): JsonResponse
    {
        $data = $request->validate(['location_id' => 'required|integer', 'date' => 'required|date_format:Y-m-d|before_or_equal:'.now()->toDateString()]);

        return response()->json(app(PosDailyReportService::class)->build((int) $data['location_id'], $data['date'], $request->user()));
    }
}
