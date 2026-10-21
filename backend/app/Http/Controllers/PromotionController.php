<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPromoCodeRequest;
use App\Models\PromoCode;
use App\Models\PromoParticipant;
use App\Models\Promotion;
use App\Services\Promotions\PromotionIdentityMask;
use App\Services\Promotions\PromotionParticipationQuery;
use App\Services\Promotions\PromotionRegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionController extends Controller
{
    private function campaign(): Promotion
    {
        return Promotion::where('is_active', true)->orderByDesc('starts_at')->first()
            ?? Promotion::where('slug', 'aniversario-2026')->firstOrFail();
    }

    public function index(Request $request, PromotionParticipationQuery $entries): View
    {
        $promotion = $this->campaign();
        $participantId = $request->session()->get('promotion.participant_id');
        $participant = $participantId ? PromoParticipant::where('promotion_id', $promotion->id)->find($participantId) : null;
        if (! $participant) {
            $request->session()->forget('promotion');
        }
        $queryCode = $request->query('code', '');
        $code = is_string($queryCode) ? strtoupper(trim($queryCode)) : '';
        $prefill = preg_match('/^[ABCDEFGHJKMNPQRSTUVWXYZ23456789]{6}$/', $code) ? $code : '';

        return view('promo.index', [
            'promotion' => $promotion, 'hasParticipant' => $participant !== null, 'prefill' => $prefill,
            'maskedIdentity' => $participant ? $request->session()->get('promotion.masked_identity') : null,
            // Only codes proven in this browser session are displayed. A known email never exposes another session's codes.
            'codes' => PromoCode::where('promotion_id', $promotion->id)->whereIn('id', (array) $request->session()->get('promotion.code_ids', []))->get(),
            'participations' => $participant ? $entries->forPromotion($promotion)->where('participant_id', $participant->id)->count() : 0,
        ]);
    }

    public function register(RegisterPromoCodeRequest $request, PromotionRegistrationService $service, PromotionIdentityMask $mask): RedirectResponse
    {
        $promotion = $this->campaign();
        $participantId = $request->session()->get('promotion.participant_id');
        if ($participantId && ! PromoParticipant::where('promotion_id', $promotion->id)->whereKey($participantId)->exists()) {
            $request->session()->forget('promotion');

            return redirect()->to(route('promo').'#registration')->withErrors(['code' => 'Vuelve a ingresar tus datos para esta campaña.']);
        }
        $code = $service->register($promotion, $request->string('code')->toString(), [
            ...$request->safe()->except(['code', 'website']), 'ip_address' => $request->ip(),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 512),
        ], $participantId ? (int) $participantId : null);
        $request->session()->regenerate();
        $request->session()->put('promotion.participant_id', $code->participant_id);
        if (! $participantId) {
            // Only mask what this browser submitted. An email match does not prove ownership of a saved profile.
            $request->session()->put('promotion.masked_identity', $mask->mask([
                'full_name' => $request->string('full_name')->toString(),
                'email' => $request->string('email')->toString(),
                'phone' => $request->string('phone')->toString(),
            ]));
        }
        $ids = (array) $request->session()->get('promotion.code_ids', []);
        $request->session()->put('promotion.code_ids', array_values(array_unique([...$ids, $code->id])));

        return redirect()->to(route('promo').'#registration')->with('promo_success', '¡Código registrado!');
    }

    public function reset(Request $request): RedirectResponse
    {
        $request->session()->forget('promotion');
        $request->session()->regenerate();

        return redirect()->to(route('promo').'#registration');
    }

    public function terms(): View
    {
        return view('promo.legal', ['promotion' => $this->campaign(), 'privacy' => false]);
    }

    public function privacy(): View
    {
        return view('promo.legal', ['promotion' => $this->campaign(), 'privacy' => true]);
    }
}
