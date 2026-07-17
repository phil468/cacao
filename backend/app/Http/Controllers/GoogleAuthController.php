<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Two\User as GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect(): SymfonyRedirectResponse|RedirectResponse
    {
        if (blank(config('services.google.client_id')) || blank(config('services.google.client_secret'))) {
            return redirect()->route('login')->withErrors(['google' => 'El acceso con Google aún no está configurado.']);
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            /** @var GoogleUser $googleUser */
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $exception) {
            Log::warning('Google authentication callback failed.', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            $message = $exception instanceof InvalidStateException
                ? 'La sesión de acceso con Google expiró o no coincide. Inténtalo nuevamente sin abrir otra pestaña.'
                : 'No pudimos completar el acceso con Google. Inténtalo nuevamente.';

            return redirect()->route('login')->withErrors(['google' => $message]);
        }

        if (blank($googleUser->getEmail())) {
            return redirect()->route('login')->withErrors(['google' => 'Google no proporcionó un correo electrónico.']);
        }

        $user = User::where('google_id', $googleUser->getId())->orWhere('email', $googleUser->getEmail())->first();
        if ($user) {
            $user->update(['google_id' => $googleUser->getId(), 'email_verified_at' => $user->email_verified_at ?? now()]);
        } else {
            $user = User::create(['name' => $googleUser->getName() ?: 'Cliente', 'email' => $googleUser->getEmail(), 'google_id' => $googleUser->getId(), 'password' => Str::random(48), 'email_verified_at' => now(), 'is_active' => true]);
            $user->assignRole('customer');
        }

        if (! $user->is_active) {
            return redirect()->route('login')->withErrors(['google' => 'Esta cuenta se encuentra desactivada.']);
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        return redirect()->intended(route('checkout'));
    }
}
