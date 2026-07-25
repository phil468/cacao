<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'data' => $request->user()->favorites()
                ->orderByDesc('favorites.created_at')
                ->pluck('product_variants.id'),
        ]);
    }

    public function store(Request $request, ProductVariant $variant): JsonResponse
    {
        abort_unless($variant->is_active && $variant->product()->where('is_active', true)->exists(), 404);

        $request->user()->favorites()->syncWithoutDetaching([$variant->id]);

        return response()->json(['data' => ['product_variant_id' => $variant->id]], 201);
    }

    public function destroy(Request $request, ProductVariant $variant): JsonResponse
    {
        $request->user()->favorites()->detach($variant->id);

        return response()->json([], 204);
    }
}
