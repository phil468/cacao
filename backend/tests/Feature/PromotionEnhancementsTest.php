<?php

use App\Models\PromoCode;
use App\Models\PromoParticipant;
use App\Models\Promotion;
use App\Services\Promotions\ScannedPromoCode;
use Illuminate\Validation\ValidationException;

it('extracts a printed QR code without navigating to its URL', function () {
    $parser = app(ScannedPromoCode::class);
    expect($parser->parse('abc234'))->toBe('ABC234')
        ->and($parser->parse('https://cacaodelperu.com/promo?code=ABC234'))->toBe('ABC234');
});

it('rejects malformed scanner data', function (string $value) {
    expect(fn () => app(ScannedPromoCode::class)->parse($value))->toThrow(ValidationException::class);
})->with(['javascript:alert(1)', 'https://example.test/admin?code=ABC234', 'https://example.test/promo?code[]=ABC234', 'ABC012', str_repeat('A', 3000)]);

it('installs legal text without changing dates or automatically approving a campaign', function () {
    $promotion = Promotion::create(['slug' => 'aniversario-2026', 'name' => 'Aniversario', 'minimum_amount' => 2000, 'amount_per_code' => 2000,
        'starts_at' => '2026-10-01', 'ends_at' => '2026-10-27', 'draw_at' => '2026-10-28 18:00:00', 'is_active' => false]);
    $this->artisan('promotions:prepare-legal')->assertSuccessful();
    expect($promotion->fresh()->terms_content)->toBeNull();
    $this->artisan('promotions:prepare-legal --apply')->assertSuccessful();
    $promotion->refresh();
    expect($promotion->legal_reviewed)->toBeFalse()->and($promotion->is_active)->toBeFalse()
        ->and($promotion->privacy_content)->toContain('12 meses')->and($promotion->terms_content)->toContain('tres personas distintas');
    $this->get('/promo/terminos')->assertOk()->assertSee('28/10/2026 18:00')->assertSee('12/11/2026')->assertSee('MegaPlaza Ica');
});

it('restricts camera permission to the code management page', function () {
    $this->get('/')->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=(self)');
});

it('anonymizes expired participant identity only on apply while preserving code ownership', function () {
    $promotion = Promotion::create(['slug' => 'expired', 'name' => 'Expired', 'minimum_amount' => 2000, 'amount_per_code' => 2000,
        'draw_at' => now()->subMonths(14), 'is_active' => false]);
    $participant = PromoParticipant::create(['promotion_id' => $promotion->id, 'full_name' => 'Ana', 'email' => 'ana@example.test',
        'phone' => '999999999', 'terms_accepted_at' => now(), 'marketing_consent' => true, 'ip_address' => '127.0.0.1']);
    $code = PromoCode::create(['promotion_id' => $promotion->id, 'code' => 'ABC234', 'status' => 'registered', 'participant_id' => $participant->id, 'generated_at' => now(), 'registered_at' => now()]);
    $this->artisan('promotions:anonymize')->assertSuccessful();
    expect($participant->fresh()->email)->toBe('ana@example.test');
    $promotion->update(['retention_hold' => true]);
    $this->artisan('promotions:anonymize --apply')->assertSuccessful();
    expect($participant->fresh()->email)->toBe('ana@example.test');
    $promotion->update(['retention_hold' => false]);
    $this->artisan('promotions:anonymize --apply')->assertSuccessful();
    expect($participant->fresh()->email)->toBe('removed-'.$participant->id.'@example.invalid')
        ->and($participant->fresh()->marketing_consent)->toBeFalse()->and($participant->fresh()->ip_address)->toBeNull()
        ->and($code->fresh()->participant_id)->toBe($participant->id);
});
