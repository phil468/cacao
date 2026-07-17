<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PushDeviceRequest;
use App\Models\PushDevice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PushDeviceController extends Controller
{
    public function store(PushDeviceRequest $request): JsonResponse
    {
        $device = PushDevice::updateOrCreate(
            ['token' => $request->string('token')->toString()],
            [...$request->validated(), 'user_id' => $request->user()->id, 'last_seen_at' => now()],
        );

        return response()->json(['data' => $device], 201);
    }

    public function destroy(Request $request): JsonResponse
    {
        $validated = $request->validate(['token' => ['required', 'string', 'max:512']]);
        $request->user()->pushDevices()->where('token', $validated['token'])->delete();

        return response()->json(['message' => 'Dispositivo desvinculado.']);
    }
}
