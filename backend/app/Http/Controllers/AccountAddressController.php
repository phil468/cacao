<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Support\IcaDistricts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AccountAddressController extends Controller
{
    public function index(Request $request): View
    {
        return view('account.addresses.index', ['addresses' => $request->user()->addresses()->latest()->get(), 'districts' => IcaDistricts::all()]);
    }

    public function store(AddressRequest $request): RedirectResponse
    {
        $this->persist($request, new Address(['user_id' => $request->user()->id]));

        return back()->with('success', 'Dirección guardada.');
    }

    public function edit(Address $address): View
    {
        abort_unless($address->user_id === auth()->id(), 403);

        return view('account.addresses.edit', ['address' => $address, 'districts' => IcaDistricts::all()]);
    }

    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $this->persist($request, $address);

        return redirect()->route('account.addresses.index')->with('success', 'Dirección actualizada.');
    }

    public function destroy(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 403);
        $address->delete();

        return back()->with('success', 'Dirección eliminada.');
    }

    private function persist(AddressRequest $request, Address $address): void
    {
        DB::transaction(function () use ($request, $address): void {
            $data = $request->validated();
            $makeDefault = $request->boolean('is_default') || ! $request->user()->addresses()->whereKeyNot($address->id)->exists();
            if ($makeDefault) {
                $request->user()->addresses()->update(['is_default' => false]);
            }
            $address->fill([...$data, 'user_id' => $request->user()->id, 'is_default' => $makeDefault])->save();
        });
    }
}
