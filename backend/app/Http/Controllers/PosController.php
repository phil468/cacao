<?php

namespace App\Http\Controllers;

use App\Models\LocationStock;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ProductVariant;
use App\Models\PromoCode;
use App\Models\Promotion;
use App\Services\PointOfSaleService;
use App\Services\PosAccess;
use App\Services\PosSettlementService;
use App\Services\Promotions\PromotionService;
use App\Services\Promotions\ScannedPromoCode;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PosController extends Controller
{
    public function session(Request $request, PosAccess $access): JsonResponse
    {
        if (! $access->allowed($request->user())) {
            return response()->json(['message' => 'Inicia sesión para acceder a caja.', 'csrf_token' => csrf_token()], 401);
        }
        $user = $request->user();

        return response()->json(['csrf_token' => csrf_token(), 'user' => ['id' => $user->id, 'name' => $user->name, 'can_discount' => $user->can('orders.manage'), 'can_inventory' => $user->can('inventory.manage'),
            'can_historical' => $user->hasRole('administrator') && $user->can('orders.manage')],
            'locations' => $access->locations($user)->get(['id', 'name', 'pickup_location_id'])]);
    }

    public function login(Request $request, PosAccess $access): JsonResponse
    {
        $data = $request->validate(['email' => 'required|email', 'password' => 'required|string|max:255']);
        if (! Auth::attemptWhen(['email' => mb_strtolower(trim($data['email'])), 'password' => $data['password'], 'is_active' => true], fn ($user): bool => $access->allowed($user))) {
            throw ValidationException::withMessages(['email' => 'Credenciales incorrectas o acceso a caja no autorizado.']);
        }
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return $this->session($request, $access);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Sesión cerrada.', 'csrf_token' => csrf_token()]);
    }

    public function catalog(Request $request, PosAccess $access): JsonResponse
    {
        $data = $request->validate(['location_id' => 'required|integer', 'historical' => 'sometimes|boolean']);
        $location = $access->location($request->user(), $data['location_id']);
        $stocks = LocationStock::where('inventory_location_id', $location->id)->pluck('quantity', 'product_variant_id');
        $historical = (bool) ($data['historical'] ?? false);
        if ($historical) {
            abort_unless($request->user()->hasRole('administrator') && $request->user()->can('orders.manage'), 403);
        }
        $query = ProductVariant::query();
        if ($historical) {
            $query->withTrashed()->whereHas('product', fn ($q) => $q->withoutGlobalScope(SoftDeletingScope::class));
        } else {
            $query->where('is_active', true)->whereHas('product', fn ($q) => $q->where('is_active', true));
        }
        $variants = $query->with(['product' => function ($q) use ($historical): void {
            if ($historical) {
                $q->withoutGlobalScope(SoftDeletingScope::class);
            } $q->with('category', 'images');
        }, 'images'])->orderBy('product_id')->orderBy('name')->get();
        $campaign = Promotion::where('is_active', true)->first();

        return response()->json([
            'variants' => $variants->map(function (ProductVariant $variant) use ($stocks): array {
                $image = $variant->images->first() ?? $variant->product->images->sortByDesc('is_primary')->first();

                return ['id' => $variant->id, 'product' => $variant->product->name, 'name' => $variant->name,
                    'sku' => $variant->sku, 'barcode' => $variant->barcode, 'category' => $variant->product->category->name ?? 'Otros',
                    'price' => $variant->currentPriceAmount(), 'stock' => (int) ($stocks[$variant->id] ?? 0),
                    'image' => $image ? asset('storage/'.$image->path) : null];
            }),
            'payment_methods' => PaymentMethod::where('is_active', true)->where('provider', 'manual')->get()->map(fn (PaymentMethod $method): array => [
                'id' => $method->id, 'name' => $method->name, 'code' => $method->code,
                'requires_proof' => $method->requires_proof || $method->canOmitPosProof(), 'can_omit_proof' => $method->canOmitPosProof(),
            ]),
            'promotion' => $campaign?->acceptsRegistrations() ? ['name' => $campaign->name, 'minimum_amount' => $campaign->minimum_amount, 'amount_per_code' => $campaign->amount_per_code] : null,
        ]);
    }

    public function uploadProof(Request $request): JsonResponse
    {
        $data = $request->validate(['proof' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:5120']);
        $path = $data['proof']->store('payment-proofs/pos/'.$request->user()->id, 'local');
        if (! is_string($path)) {
            throw ValidationException::withMessages(['proof' => 'No se pudo guardar la constancia. Inténtalo nuevamente.']);
        }

        return response()->json(['path' => $path], 201);
    }

    public function sell(Request $request, PointOfSaleService $sales, PosAccess $access): JsonResponse
    {
        $data = $request->validate([...PosSettlementService::rules(), ...PointOfSaleService::operationRules(), 'location_id' => 'required|integer', 'pos_submission_id' => 'required|uuid',
            'customer_name' => 'required|string|max:120', 'customer_email' => 'nullable|email|max:255', 'customer_phone' => 'nullable|string|max:30',
            'items' => 'required|array|min:1|max:100', 'items.*.variant_id' => 'required|integer|distinct', 'items.*.quantity' => 'required|integer|min:1|max:1000',
            'payment_confirmed' => 'accepted', 'promo_codes' => 'sometimes|array|max:100', 'promo_codes.*' => 'string|max:2048|distinct']);
        $location = $access->location($request->user(), $data['location_id']);
        if (! empty($data['payment_proof_path']) && ! str_starts_with($data['payment_proof_path'], 'payment-proofs/pos/'.$request->user()->id.'/')) {
            abort(403);
        }
        $data['promo_codes'] = array_map(fn (string $code): string => app(ScannedPromoCode::class)->parse($code), $data['promo_codes'] ?? []);
        $order = $sales->sell([...$data, 'pickup_location_id' => $location->pickup_location_id, 'inventory_location_id' => $location->id], $request->user());

        return response()->json($this->receipt($order), 201);
    }

    public function handover(Request $request, Order $order, PosAccess $access, PromotionService $promotions): JsonResponse
    {
        $access->location($request->user(), (int) $order->inventory_location_id);
        abort_unless($order->sales_channel === 'pos' && ($request->user()->can('orders.manage') || $order->cashier_id === $request->user()->id), 403);
        $data = $request->validate(['code' => 'required|string|max:2048']);
        $value = app(ScannedPromoCode::class)->parse($data['code']);
        $code = PromoCode::where('code', $value)->firstOrFail();
        $promotions->recordDelivery($code, $order, $request->user());

        return response()->json($this->receipt($order));
    }

    public function proof(Request $request, Order $order, PosAccess $access): StreamedResponse
    {
        if (! $request->user()->can('orders.manage')) {
            $access->location($request->user(), (int) $order->inventory_location_id);
            abort_unless($order->cashier_id === $request->user()->id, 403);
        }
        $path = $order->payment_proof_path;
        if ($request->filled('payment_id')) {
            $request->validate(['payment_id' => 'required|integer']);
            $path = $order->posPayments()->findOrFail($request->integer('payment_id'))->proof_path;
        }
        abort_unless($order->payment_proof_disk === 'local' && $path !== null, 404);

        return Storage::disk('local')->download($path, 'constancia-'.$order->number.'.'.pathinfo($path, PATHINFO_EXTENSION), ['Cache-Control' => 'private, no-store']);
    }

    /** @return array<string, mixed> */
    private function receipt(Order $order): array
    {
        return ['id' => $order->id, 'number' => $order->number, 'total_amount' => $order->total_amount,
            'is_historical' => $order->is_historical, 'sold_on' => $order->getAttribute('sold_on')?->format('Y-m-d'), 'cash_shift_id' => $order->cash_shift_id,
            'subtotal_amount' => $order->subtotal_amount, 'discount_amount' => $order->discount_amount,
            'discount_type' => $order->getAttribute('pos_discount_type'), 'discount_percentage' => $order->getAttribute('pos_discount_basis_points'),
            'payments' => $order->posPayments()->with('paymentMethod')->get()->map(fn ($payment): array => [
                'method' => $payment->paymentMethod->name, 'amount' => $payment->amount, 'proof_missing' => $payment->proof_missing,
                'cash_received_amount' => $payment->cash_received_amount, 'change_amount' => $payment->change_amount,
            ]),
            'customer_name' => $order->customer_name, 'payment_proof_missing' => $order->payment_proof_missing, 'codes' => $order->promoCodes()->pluck('code'),
            'items' => $order->items()->get(['product_name', 'variant_name', 'quantity', 'line_total_amount'])];
    }
}
