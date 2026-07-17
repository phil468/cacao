<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class StorefrontAuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required', 'string']]);

        if (! Auth::attempt([...$credentials, 'is_active' => true], $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'El correo o la contraseña no son correctos.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('checkout'));
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'], 'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:30'], 'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'name.required' => 'Ingresa tu nombre completo.', 'email.required' => 'Ingresa tu correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.', 'email.unique' => 'Este correo ya tiene una cuenta.',
            'phone.required' => 'Ingresa tu teléfono.', 'password.required' => 'Ingresa una contraseña.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.', 'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
        $user = User::create([...$data, 'password' => Hash::make($data['password']), 'is_active' => true]);
        $user->assignRole('customer');
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('checkout');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
