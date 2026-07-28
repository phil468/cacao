<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefrontCheckoutRequest;
use App\Models\DeliveryRate;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\ProductVariant;
use App\Services\CheckoutQuoteService;
use App\Services\CheckoutService;
use App\Support\IcaDistricts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StorefrontCheckoutController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $cart = $this->cart($request);
        if ($cart === []) {
            return redirect()->route('cart')->withErrors(['cart' => 'Agrega al menos un producto antes de continuar.']);
        }

        return view('checkout', [
            'paymentMethods' => PaymentMethod::where('is_active', true)->get(),
            'deliveryRates' => DeliveryRate::where('is_active', true)->with('deliveryZone')->get(),
            'user' => $request->user(),
            'defaultAddress' => $request->user()->addresses()->where('is_default', true)->first() ?? $request->user()->addresses()->latest()->first(),
            'districts' => IcaDistricts::all(),
            'pickupLocations' => PickupLocation::available()->orderBy('starts_at')->orderBy('name')->get(),
        ]);
    }

    public function store(StorefrontCheckoutRequest $request, CheckoutService $checkout): RedirectResponse
    {
        $user = $request->user();
        abort_if($user === null, 401);
        $cart = $this->cart($request);
        $variants = ProductVariant::whereIn('id', array_keys($cart))->pluck('id')->all();
        $items = collect($cart)->filter(fn (int $quantity, int $id): bool => in_array($id, $variants, true))->map(fn (int $quantity, int $id): array => ['variant_id' => $id, 'quantity' => $quantity])->values()->all();
        abort_if($items === [], 422, 'El carrito está vacío.');
        $data = $request->validated();
        $proofPath = $request->file('payment_proof')?->store('payment-proofs', 'public');
        $fulfillmentType = (string) $data['fulfillment_type'];
        $address = array_intersect_key($data, array_flip(['recipient_name', 'phone', 'document_number', 'line_one', 'reference', 'district', 'province', 'department']));
        $deliveryRateId = $fulfillmentType === 'delivery' ? $this->resolveDeliveryRate((string) $data['district'])->id : null;
        $order = $checkout->checkout(
            $user,
            $items,
            $address,
            (int) $data['payment_method_id'],
            $deliveryRateId,
            $data['coupon_code'] ?? null,
            $proofPath,
            $request->boolean('whatsapp_updates_opt_in'),
            $request->session()->get('marketing_attribution'),
            $fulfillmentType,
            isset($data['pickup_location_id']) ? (int) $data['pickup_location_id'] : null,
            $data['billing_document_type'] ?? null,
            $data['billing_document_number'] ?? null,
        );
        $request->session()->forget('storefront_cart');

        if ($order->paymentMethod->provider === 'izipay') {
            return redirect()->route('checkout.izipay', $order);
        }

        return redirect()->route('checkout.success', $order);
    }

    /** @return array<int, int> */
    private function cart(Request $request): array
    {
        $stored = $request->session()->get('storefront_cart', []);
        if (! is_array($stored)) {
            return [];
        }

        $cart = [];
        foreach ($stored as $variantId => $quantity) {
            if (is_numeric($variantId) && is_numeric($quantity) && (int) $quantity > 0) {
                $cart[(int) $variantId] = min((int) $quantity, 50);
            }
        }

        return $cart;
    }

    public function quote(Request $request, CheckoutQuoteService $quotes): JsonResponse
    {
        $request->mergeIfMissing(['fulfillment_type' => 'delivery']);
        $data = $request->validate([
            'fulfillment_type' => ['required', 'in:delivery,pickup'],
            'pickup_location_id' => ['nullable', 'required_if:fulfillment_type,pickup', 'integer'],
            'district' => ['nullable', 'required_if:fulfillment_type,delivery', 'string', 'max:100'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
        ]);
        $cart = $this->cart($request);
        $items = collect($cart)->map(fn (int $quantity, int $variantId): array => ['variant_id' => $variantId, 'quantity' => $quantity])->values()->all();

        return response()->json($quotes->quote(
            $items,
            $data['district'] ?? null,
            $data['coupon_code'] ?? null,
            $request->user(),
            (string) $data['fulfillment_type'],
            isset($data['pickup_location_id']) ? (int) $data['pickup_location_id'] : null,
        ));
    }

    private function resolveDeliveryRate(string $district): DeliveryRate
    {
        $normalizedDistrict = Str::lower(Str::ascii(trim($district)));
        $rate = DeliveryRate::where('is_active', true)->with('deliveryZone')->get()->first(function (DeliveryRate $rate) use ($normalizedDistrict): bool {
            if (! $rate->deliveryZone->is_active) {
                return false;
            }

            return collect($rate->deliveryZone->districts)->contains(fn (string $candidate): bool => Str::lower(Str::ascii(trim($candidate))) === $normalizedDistrict);
        });

        if (! $rate) {
            throw ValidationException::withMessages(['district' => 'No tenemos una tarifa de entrega activa para este distrito.']);
        }

        return $rate;
    }
}
