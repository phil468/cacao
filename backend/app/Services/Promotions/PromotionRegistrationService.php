<?php

namespace App\Services\Promotions;

use App\Models\PromoCode;
use App\Models\PromoCodeBatch;
use App\Models\PromoParticipant;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PromotionRegistrationService
{
    /** @param array<string, mixed> $identity */
    public function register(Promotion $promotion, string $value, array $identity, ?int $sessionParticipantId = null): PromoCode
    {
        return DB::transaction(function () use ($promotion, $value, $identity, $sessionParticipantId): PromoCode {
            $current = Promotion::whereKey($promotion->id)->lockForUpdate()->firstOrFail();
            if (! $current->acceptsRegistrations()) {
                throw ValidationException::withMessages(['code' => 'La promoción no está disponible para registros en este momento.']);
            }
            $code = PromoCode::where('code', strtoupper(trim($value)))->where('promotion_id', $current->id)->lockForUpdate()->first();
            if (! $code) {
                throw ValidationException::withMessages(['code' => 'El código ingresado no es válido. Revisa los caracteres e inténtalo nuevamente.']);
            }
            if ($code->status === 'disabled') {
                throw ValidationException::withMessages(['code' => 'Este código no se encuentra disponible.']);
            }
            if ($code->status === 'registered' || $code->participant_id !== null) {
                throw ValidationException::withMessages(['code' => 'Este código ya fue registrado.']);
            }
            $delivered = $code->order_id !== null && $code->delivered_at !== null;
            $enabled = match ($code->activation_mode) {
                'sale' => $code->activated_at !== null && $delivered,
                'courtesy' => $code->activated_at !== null,
                // Historical handovers have an order and delivery date, but no activation timestamp.
                'legacy' => $delivered,
                default => false,
            };
            if (! $enabled) {
                throw ValidationException::withMessages(['code' => 'Este cupón todavía no ha sido habilitado para participar. Consulta al punto de venta.']);
            }
            $batch = $code->batch_id ? PromoCodeBatch::whereKey($code->batch_id)->lockForUpdate()->firstOrFail() : null;
            if ($batch && $batch->status !== 'active') {
                throw ValidationException::withMessages(['code' => 'Este código no se encuentra disponible.']);
            }
            if ($sessionParticipantId !== null) {
                $participant = PromoParticipant::where('promotion_id', $current->id)->findOrFail($sessionParticipantId);
            } else {
                validator($identity, [
                    'full_name' => ['required', 'string', 'max:120'], 'email' => ['required', 'email', 'max:255'],
                    'phone' => ['required', 'string', 'regex:/^\+?[0-9 ()-]{7,30}$/'],
                    'terms_accepted' => ['accepted'], 'marketing_consent' => ['sometimes', 'boolean'],
                ], ['terms_accepted.accepted' => 'Debes aceptar los Términos y Condiciones para participar.'])->validate();
                $participant = PromoParticipant::firstOrCreate([
                    'promotion_id' => $current->id, 'email' => mb_strtolower(trim((string) $identity['email'])),
                ], [
                    'full_name' => $identity['full_name'], 'phone' => $identity['phone'], 'terms_accepted_at' => now(),
                    'marketing_consent' => (bool) ($identity['marketing_consent'] ?? false),
                    'marketing_consent_at' => ! empty($identity['marketing_consent']) ? now() : null,
                    'ip_address' => $identity['ip_address'] ?? null, 'user_agent' => $identity['user_agent'] ?? null,
                ]);
                // An email address is an identity key, not proof of ownership. Never overwrite an existing profile or consent.
            }
            $code->update(['participant_id' => $participant->id, 'status' => 'registered', 'registered_at' => now()]);

            return $code;
        }, 5);
    }
}
