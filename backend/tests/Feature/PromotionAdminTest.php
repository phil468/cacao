<?php

use App\Filament\Resources\PromotionResource\Pages\EditPromotion;
use App\Models\Promotion;
use App\Models\User;
use App\Services\Promotions\PromotionLegalContent;
use Database\Seeders\PromotionSeeder;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->withoutVite();
    Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $this->seed(PromotionSeeder::class);
    $admin = User::create(['name' => 'Promotion manager', 'email' => 'promotion-manager@example.test', 'password' => 'testing-password', 'is_active' => true]);
    $admin->assignRole('administrator');
    $this->actingAs($admin);
    $this->promotion = Promotion::where('slug', 'aniversario-2026')->firstOrFail();
    $this->promotion->update(['terms_content' => 'Condiciones revisadas.', 'privacy_content' => 'Política revisada.']);
    $this->dates = ['starts_at' => '2026-10-01 08:00:00', 'ends_at' => '2026-10-27 22:00:00', 'draw_at' => '2026-10-28 18:00:00'];
});

it('saves a valid promotion edit and shows its success notification', function () {
    Livewire::test(EditPromotion::class, ['record' => $this->promotion->getRouteKey()])
        ->fillForm([...$this->dates, 'name' => 'Updated campaign', 'legal_reviewed' => true, 'is_active' => true])
        ->call('save')->assertHasNoFormErrors()->assertNotified();
    expect($this->promotion->fresh()->name)->toBe('Updated campaign')
        ->and($this->promotion->fresh()->is_active)->toBeTrue();
});

it('shows activation rejection on the actual form field and sends a failure notification', function () {
    Livewire::test(EditPromotion::class, ['record' => $this->promotion->getRouteKey()])
        ->fillForm([...$this->dates, 'legal_reviewed' => false, 'is_active' => true])
        ->call('save')->assertHasFormErrors(['is_active'])->assertNotified();
    expect($this->promotion->fresh()->is_active)->toBeFalse()
        ->and($this->promotion->fresh()->starts_at)->toBeNull();
});

it('notifies clearly when required dates prevent saving', function () {
    Livewire::test(EditPromotion::class, ['record' => $this->promotion->getRouteKey()])
        ->call('save')->assertHasFormErrors(['starts_at' => 'required', 'ends_at' => 'required'])->assertNotified();
});

it('activates with the actual reviewed legal text containing ordinary pending claims wording', function () {
    $content = new PromotionLegalContent;
    expect($content->privacy())->toContain('reclamos pendientes');
    Livewire::test(EditPromotion::class, ['record' => $this->promotion->getRouteKey()])
        ->fillForm([...$this->dates, 'terms_content' => $content->terms(), 'privacy_content' => $content->privacy(), 'legal_reviewed' => true, 'is_active' => true])
        ->call('save')->assertHasNoFormErrors()->assertNotified();
    expect($this->promotion->fresh()->is_active)->toBeTrue()
        ->and($this->promotion->fresh()->privacy_content)->toBe($content->privacy());
});

it('rejects explicit unfinished legal markers on their corresponding form fields', function (string $field, string $marker) {
    Livewire::test(EditPromotion::class, ['record' => $this->promotion->getRouteKey()])
        ->fillForm([...$this->dates, $field => 'Texto legal: '.$marker, 'legal_reviewed' => true, 'is_active' => true])
        ->call('save')->assertHasFormErrors([$field])->assertNotified();
    expect($this->promotion->fresh()->is_active)->toBeFalse();
})->with([
    ['terms_content', '[PENDIENTE DE REVISIÓN LEGAL]'],
    ['privacy_content', '[PENDIENTE DE REVISIÓN LEGAL]'],
    ['terms_content', '[pendiente]'],
    ['privacy_content', '[ PENDIENTE: completar domicilio ]'],
]);
