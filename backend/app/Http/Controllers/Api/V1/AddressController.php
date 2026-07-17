<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return AddressResource::collection($request->user()->addresses()->orderByDesc('is_default')->latest()->get());
    }

    public function store(AddressRequest $request): JsonResponse
    {
        return (new AddressResource($this->persist($request, new Address(['user_id' => $request->user()->id]))))->response()->setStatusCode(201);
    }

    public function update(AddressRequest $request, Address $address): AddressResource
    {
        return new AddressResource($this->persist($request, $address));
    }

    public function destroy(Request $request, Address $address): JsonResponse
    {
        abort_unless($address->user_id === $request->user()->id, 403);
        $address->delete();

        return response()->json(['message' => 'Dirección eliminada.']);
    }

    public function makeDefault(Request $request, Address $address): AddressResource
    {
        abort_unless($address->user_id === $request->user()->id, 403);
        DB::transaction(function () use ($request, $address): void {
            $request->user()->addresses()->update(['is_default' => false]);
            $address->update(['is_default' => true]);
        });

        return new AddressResource($address->refresh());
    }

    private function persist(AddressRequest $request, Address $address): Address
    {
        return DB::transaction(function () use ($request, $address): Address {
            $makeDefault = $request->boolean('is_default') || ! $request->user()->addresses()->whereKeyNot($address->id)->exists();
            if ($makeDefault) {
                $request->user()->addresses()->update(['is_default' => false]);
            }
            $address->fill([...$request->validated(), 'user_id' => $request->user()->id, 'is_default' => $makeDefault])->save();

            return $address->refresh();
        });
    }
}
