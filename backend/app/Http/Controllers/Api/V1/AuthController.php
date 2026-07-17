<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $r): JsonResponse
    {
        $u = User::create($r->safe()->except('password') + ['password' => $r->string('password')]);
        $u->assignRole('customer');

        return response()->json(['token' => $u->createToken('mobile')->plainTextToken, 'user' => $u], 201);
    }

    public function login(LoginRequest $r): JsonResponse
    {
        $u = User::where('email', $r->string('email'))->first();
        if (! $u || ! $u->is_active || ! Hash::check($r->string('password'), $u->password)) {
            throw ValidationException::withMessages(['email' => 'Las credenciales no son válidas.']);
        }

        return response()->json(['token' => $u->createToken($r->string('device_name'))->plainTextToken, 'user' => $u]);
    }

    public function logout(Request $r): JsonResponse
    {
        $r->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada.']);
    }
}
