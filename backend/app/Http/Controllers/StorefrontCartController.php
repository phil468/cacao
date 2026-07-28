<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StorefrontCartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = $this->cart($request);
        $variants = ProductVariant::with(['images', 'product.images'])->whereIn('id', array_keys($cart))->get()->keyBy('id');
        $items = collect($cart)->map(function (int $quantity, int $variantId) use ($variants): ?array {
            $variant = $variants->get($variantId);

            if (! $variant || ! $variant->is_active || ! $variant->product->is_active) {
                return null;
            }

            $availableQuantity = min($quantity, $variant->stock);

            return ['variant' => $variant, 'quantity' => $availableQuantity, 'line_total' => $variant->currentPriceAmount() * $availableQuantity];
        })->filter()->values();

        return view('cart', ['items' => $items, 'subtotal' => $items->sum('line_total')]);
    }

    public function store(AddCartItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $variant = ProductVariant::with('product')->findOrFail($data['variant_id']);
        abort_unless($variant->is_active && $variant->product->is_active, 404);

        $cart = $this->cart($request);
        $quantity = min(($cart[$variant->id] ?? 0) + $data['quantity'], $variant->stock);

        if ($quantity < 1) {
            return back()->withErrors(['variant_id' => 'Esta presentación no tiene stock disponible.']);
        }

        $cart[$variant->id] = $quantity;
        $request->session()->put('storefront_cart', $cart);

        return redirect(route('product', $variant->product).'#variant-'.$variant->id)->with('success', "{$variant->name} se agregó al carrito.");
    }

    public function update(UpdateCartItemRequest $request, ProductVariant $variant): RedirectResponse
    {
        $cart = $this->cart($request);
        abort_unless(array_key_exists($variant->id, $cart), 404);
        $cart[$variant->id] = min($request->integer('quantity'), $variant->stock);
        $request->session()->put('storefront_cart', $cart);

        return back()->with('success', 'Cantidad actualizada.');
    }

    public function destroy(Request $request, ProductVariant $variant): RedirectResponse
    {
        $cart = $this->cart($request);
        unset($cart[$variant->id]);
        $request->session()->put('storefront_cart', $cart);

        return back()->with('success', 'Producto retirado del carrito.');
    }

    /** @return array<int, int> */
    private function cart(Request $request): array
    {
        return $request->session()->get('storefront_cart', []);
    }
}
