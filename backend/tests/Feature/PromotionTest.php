<?php

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PromoCode;
use App\Models\PromoParticipant;
use App\Models\Promotion;
use App\Models\PromotionAuditLog;
use App\Models\User;
use App\Services\Promotions\PromotionExportService;
use App\Services\Promotions\PromotionParticipationQuery;
use App\Services\Promotions\PromotionRegistrationService;
use App\Services\Promotions\PromotionService;
use Database\Seeders\PromotionSeeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;

beforeEach(function () {
    $this->promotion = Promotion::create([
        'name' => 'Aniversario Cacao del Perú 2026', 'slug' => 'aniversario-2026',
        'starts_at' => now()->subDay(), 'ends_at' => now()->addDay(), 'draw_at' => now()->addDays(2),
        'minimum_amount' => 2000, 'amount_per_code' => 2000, 'is_active' => true, 'legal_reviewed' => true,
        'terms_content' => 'Condiciones aprobadas de la campaña.', 'privacy_content' => 'Política revisada de tratamiento de datos.',
    ]);
    Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
    $this->seed(PromotionSeeder::class);
    $this->admin = User::create(['name' => 'Administrador', 'email' => 'promo-admin@example.test', 'password' => 'secretsecret', 'is_active' => true]);
    $this->admin->assignRole('administrator');
    $this->batch = app(PromotionService::class)->generateBatch($this->promotion, 'MEGAPLAZA-001', 3, $this->admin);
    // Registration fixtures represent explicitly enabled courtesy coupons, never unissued stock.
    $this->batch->codes()->update(['activation_mode' => 'courtesy', 'activated_at' => now(), 'activated_by' => $this->admin->id]);
    $this->code = $this->batch->codes()->firstOrFail();
    $this->identity = ['full_name' => 'Ana Pérez', 'email' => 'ana@example.test', 'phone' => '999999999', 'terms_accepted' => '1'];
});

it('registers a valid lowercase code and keeps personal data in the server session', function () {
    $this->post(route('promo.register'), [...$this->identity, 'code' => strtolower($this->code->code)])
        ->assertRedirect(route('promo').'#registration')->assertSessionHas('promotion.participant_id');
    expect($this->code->fresh()->status)->toBe('registered');
    $this->get(route('promo'))->assertOk()->assertSee('Tienes 1 participación')->assertSee($this->code->code);
});

it('rejects an already registered code without reassigning it', function () {
    $service = app(PromotionRegistrationService::class);
    $service->register($this->promotion, $this->code->code, $this->identity);
    $participant = $this->code->fresh()->participant_id;
    try {
        $service->register($this->promotion, $this->code->code, [...$this->identity, 'email' => 'other@example.test']);
        $this->fail('The same code must not be reassigned.');
    } catch (ValidationException $exception) {
        expect($exception->errors()['code'][0])->toBe('Este código ya fue registrado.');
    }
    expect($this->code->fresh()->participant_id)->toBe($participant)->and(PromoParticipant::count())->toBe(1);
});

it('rejects an unknown code', function () {
    $this->post(route('promo.register'), [...$this->identity, 'code' => 'AAAAAA'])->assertSessionHasErrors('code');
    expect(PromoParticipant::count())->toBe(0);
});

it('rejects malformed array inputs through validation rather than raising server errors', function () {
    $this->post(route('promo.register'), [...$this->identity, 'code' => ['AAAAAA']])->assertSessionHasErrors('code');
    $this->post(route('promo.register'), [...$this->identity, 'email' => ['ana@example.test'], 'code' => $this->code->code])->assertSessionHasErrors('email');
    $this->get(route('promo', ['code' => ['AAAAAA']]))->assertOk();
    expect(PromoParticipant::count())->toBe(0);
});

it('rejects a disabled code', function () {
    $this->code->update(['status' => 'disabled']);
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasErrors('code');
});

it('requires terms and leaves marketing optional', function () {
    $this->post(route('promo.register'), [...$this->identity, 'terms_accepted' => '0', 'code' => $this->code->code])->assertSessionHasErrors('terms_accepted');
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasNoErrors();
    expect(PromoParticipant::first()->marketing_consent)->toBeFalse()->and(PromoParticipant::first()->marketing_consent_at)->toBeNull();
});

it('audits an explicit marketing consent', function () {
    $this->post(route('promo.register'), [...$this->identity, 'marketing_consent' => '1', 'code' => $this->code->code])->assertSessionHasNoErrors();
    expect(PromoParticipant::first()->marketing_consent)->toBeTrue()->and(PromoParticipant::first()->marketing_consent_at)->not->toBeNull();
});

it('adds more codes using only the secure participant session', function () {
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasNoErrors();
    $other = $this->batch->codes()->where('id', '!=', $this->code->id)->first();
    $this->post(route('promo.register'), ['code' => $other->code])->assertSessionHasNoErrors();
    expect(PromoParticipant::count())->toBe(1)->and(PromoCode::where('status', 'registered')->count())->toBe(2);
    $this->get(route('promo'))->assertSee('Tienes 2 participaciones');
});

it('blocks an unissued legacy coupon without creating a participant', function () {
    $this->code->update(['activation_mode' => 'legacy', 'activated_at' => null]);
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasErrors('code');
    expect($this->code->fresh()->status)->toBe('available')
        ->and($this->code->fresh()->participant_id)->toBeNull()->and(PromoParticipant::count())->toBe(0);
});

it('does not accept a sale activation without a recorded handover', function () {
    $this->code->update(['activation_mode' => 'sale']);
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasErrors('code');
    expect($this->code->fresh()->status)->toBe('available');
});

it('shows only masked identity submitted by the current browser and keeps it for the next code', function () {
    $identity = ['full_name' => 'John Delgado', 'email' => 'jddelgado@gmail.com', 'phone' => '987654084', 'terms_accepted' => '1'];
    $this->post(route('promo.register'), [...$identity, 'code' => $this->code->code])
        ->assertSessionHasNoErrors()->assertSessionHas('promotion.masked_identity', ['full_name' => 'Jo** De*****', 'email' => 'jdd***@gmail.com', 'phone' => '***084']);
    $this->get(route('promo'))->assertSee('Jo** De*****')->assertSee('jdd***@gmail.com')->assertSee('***084')
        ->assertDontSee('John Delgado')->assertDontSee('jddelgado@gmail.com')->assertDontSee('987654084');
    $other = $this->batch->codes()->where('id', '!=', $this->code->id)->firstOrFail();
    $this->post(route('promo.register'), ['code' => $other->code])->assertSessionHasNoErrors();
    $this->get(route('promo'))->assertSee('Jo** De*****')->assertSee('Tienes 2 participaciones');
    $this->post(route('promo.reset'))->assertSessionMissing('promotion.masked_identity')->assertSessionMissing('promotion.participant_id');
    $this->get(route('promo'))->assertDontSee('Jo** De*****')->assertDontSee('jdd***@gmail.com');
});

it('never discloses the stored profile when another browser submits an existing email', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    $other = $this->batch->codes()->where('id', '!=', $this->code->id)->firstOrFail();
    $this->post(route('promo.register'), [...$this->identity, 'full_name' => 'Persona Distinta', 'phone' => '999111222', 'code' => $other->code])->assertSessionHasNoErrors();
    $this->get(route('promo'))->assertSee('Pe***** Di******')->assertSee('***222')->assertDontSee('An* Pé***')->assertDontSee('***999');
    expect(PromoParticipant::first()->full_name)->toBe('Ana Pérez');
});

it('never derives a missing old-session identity summary from the stored profile', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    $this->withSession(['promotion.participant_id' => $this->code->fresh()->participant_id, 'promotion.code_ids' => [$this->code->id]])
        ->get(route('promo'))->assertOk()->assertSee('sesión anterior')->assertDontSee('Ana Pérez')->assertDontSee('ana@example.test')->assertDontSee('999999999');
});

it('preserves already registered legacy ownership while rejecting duplicate registration', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    $this->code->refresh()->update(['activation_mode' => 'legacy', 'activated_at' => null]);
    $participantId = $this->code->participant_id;
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasErrors(['code' => 'Este código ya fue registrado.']);
    expect($this->code->fresh()->participant_id)->toBe($participantId)->and($this->code->fresh()->status)->toBe('registered')
        ->and(app(PromotionParticipationQuery::class)->forPromotion($this->promotion)->count())->toBe(1);
});

it('normalizes email without exposing prior codes or overwriting consent', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, [...$this->identity, 'marketing_consent' => false]);
    $other = $this->batch->codes()->where('id', '!=', $this->code->id)->first();
    $this->post(route('promo.register'), [...$this->identity, 'email' => 'ANA@EXAMPLE.TEST', 'marketing_consent' => '1', 'code' => $other->code])->assertSessionHasNoErrors();
    expect(PromoParticipant::count())->toBe(1)->and(PromoParticipant::first()->marketing_consent)->toBeFalse();
    $this->get(route('promo'))->assertSee('Tienes 2 participaciones')->assertDontSee($this->code->code)->assertDontSee('ana@example.test');
});

it('calculates thresholds in integer cents', function (int $amount, int $expected) {
    expect(app(PromotionService::class)->quantityForAmount($this->promotion, $amount))->toBe($expected);
})->with([[1999, 0], [2000, 1], [3999, 1], [4000, 2], [10000, 5], [6700, 3]]);

it('excludes delivery and deducts product discounts', function () {
    $order = new Order(['subtotal_amount' => 4500, 'discount_amount' => 1000, 'delivery_amount' => 1500, 'total_amount' => 5000]);
    expect(app(PromotionService::class)->quantityForOrder($this->promotion, $order))->toBe(1);
    expect(PromoCode::count())->toBe(3); // No automatic digital issuance.
});

it('generates unique physical codes with the approved alphabet', function () {
    $batch = app(PromotionService::class)->generateBatch($this->promotion, 'BULK', 500, $this->admin);
    $codes = $batch->codes()->pluck('code');
    expect($codes->unique()->count())->toBe(500);
    foreach ($codes as $code) {
        expect($code)->toMatch('/^[ABCDEFGHJKMNPQRSTUVWXYZ23456789]{6}$/');
    }
    expect($batch->codes()->where('type', 'physical')->count())->toBe(500);
});

it('enforces database uniqueness after uppercase normalization', function () {
    expect(fn () => PromoCode::create(['promotion_id' => $this->promotion->id, 'code' => strtolower($this->code->code), 'generated_at' => now()]))->toThrow(UniqueConstraintViolationException::class);
});

it('disables available codes and preserves registered ownership when a batch is disabled', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    app(PromotionService::class)->disableBatch($this->batch, $this->admin);
    expect($this->batch->fresh()->status)->toBe('disabled')->and($this->batch->codes()->where('status', 'disabled')->count())->toBe(2)
        ->and($this->code->fresh()->status)->toBe('registered')->and($this->code->fresh()->participant_id)->not->toBeNull();
    expect(app(PromotionParticipationQuery::class)->forPromotion($this->promotion)->count())->toBe(0);
});

it('invalidates returned registered coupons without deleting registration history', function () {
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    $participantId = $this->code->fresh()->participant_id;
    app(PromotionService::class)->invalidate($this->code, $this->admin, 'Devolución de compra y cupón físico.');
    expect($this->code->fresh()->status)->toBe('disabled')->and($this->code->fresh()->participant_id)->toBe($participantId)
        ->and($this->code->fresh()->registered_at)->not->toBeNull();
    expect(app(PromotionParticipationQuery::class)->forPromotion($this->promotion)->count())->toBe(0);
    expect(PromotionAuditLog::where('event', 'code.invalidated')->count())->toBe(1);
});

it('rejects inactive expired and future campaigns', function (string $case) {
    if ($case === 'inactive') {
        $this->promotion->update(['is_active' => false]);
    }
    if ($case === 'expired') {
        $this->promotion->update(['starts_at' => now()->subDays(3), 'ends_at' => now()->subDay()]);
    }
    if ($case === 'future') {
        $this->promotion->update(['starts_at' => now()->addHour()]);
    }
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code])->assertSessionHasErrors('code');
})->with(['inactive', 'expired', 'future']);

it('does not activate unreviewed legal drafts', function () {
    expect(fn () => $this->promotion->update(['legal_reviewed' => false]))->toThrow(ValidationException::class);
});

it('prefills only a well formed query code and keeps campaign metadata indexable', function () {
    $this->get(route('promo', ['code' => strtolower($this->code->code)]))->assertOk()->assertSee('value="'.$this->code->code.'"', false)->assertSee('Sorteo de Aniversario | Cacao del Perú')->assertSee('index,follow');
    $this->get(route('promo.terms'))->assertOk();
    $this->get(route('privacy'))->assertOk();
});

it('blocks honeypot submissions and limits registration attempts', function () {
    $this->post(route('promo.register'), [...$this->identity, 'code' => $this->code->code, 'website' => 'spam'])->assertSessionHasErrors('website');
    for ($i = 0; $i < 9; $i++) {
        $this->post(route('promo.register'), ['code' => 'AAAAAA']);
    }
    $this->post(route('promo.register'), ['code' => 'AAAAAA'])->assertStatus(429);
});

it('renders authorized administration and denies unprivileged users', function () {
    foreach (['promotions', 'promo-code-batches', 'promo-codes', 'promo-participants', 'promotion-audit-logs'] as $path) {
        $this->actingAs($this->admin)->get('/admin/'.$path)->assertOk();
    }
    $customer = User::create(['name' => 'Cliente', 'email' => 'customer@example.test', 'password' => 'secretsecret', 'is_active' => true]);
    $this->actingAs($customer)->get('/admin/promo-codes')->assertForbidden();
    expect(fn () => app(PromotionService::class)->generateBatch($this->promotion, 'DENIED', 1, $customer))->toThrow(HttpException::class);
});

it('exports CSV without participant data and protects spreadsheet formulas', function () {
    $this->batch->update(['name' => '=DANGEROUS']);
    $response = app(PromotionExportService::class)->csv($this->batch, $this->admin);
    ob_start();
    $response->sendContent();
    $csv = ob_get_clean();
    expect($csv)->toContain($this->code->code)->toContain("'=DANGEROUS")->not->toContain('ana@example.test');
    expect(PromotionAuditLog::where('event', 'batch.exported.csv')->count())->toBe(1);
});

it('exports A4 coupon PDFs for both sides', function () {
    foreach (['front', 'back'] as $side) {
        $bytes = app(PromotionExportService::class)->pdf($this->batch, $this->admin, $side);
        expect(str_starts_with($bytes, '%PDF-'))->toBeTrue();
        preg_match('/\/MediaBox \[0\.000 0\.000 ([\d.]+) ([\d.]+)\]/', $bytes, $dimensions);
        expect((float) $dimensions[1])->toBeGreaterThan(595.2)->toBeLessThan(595.4);
        expect((float) $dimensions[2])->toBeGreaterThan(841.8)->toBeLessThan(842.0);
    }
});

it('seeds campaign and permissions idempotently without overwriting administrator dates', function () {
    $date = $this->promotion->draw_at;
    $this->seed(PromotionSeeder::class);
    $this->seed(PromotionSeeder::class);
    expect(Promotion::count())->toBe(1)->and($this->promotion->fresh()->draw_at->equalTo($date))->toBeTrue();
});

it('links delivered physical codes idempotently and enforces the product amount limit', function () {
    $this->batch->codes()->update(['activation_mode' => 'reserve', 'activated_at' => null]);
    $permission = Permission::firstOrCreate(['name' => 'orders.view', 'guard_name' => 'web']);
    $this->admin->givePermissionTo($permission);
    $status = OrderStatus::create(['code' => 'delivered', 'name' => 'Entregado']);
    $method = PaymentMethod::create(['code' => 'cash', 'name' => 'Efectivo']);
    $order = Order::create(['number' => (string) Str::uuid(), 'user_id' => $this->admin->id,
        'order_status_id' => $status->id, 'payment_method_id' => $method->id, 'customer_name' => 'Ana',
        'customer_email' => 'ana@example.test', 'customer_phone' => '999999999', 'delivery_address' => [],
        'subtotal_amount' => 3000, 'discount_amount' => 500, 'delivery_amount' => 2000, 'total_amount' => 4500]);
    $service = app(PromotionService::class);
    $service->recordDelivery($this->code, $order, $this->admin);
    $service->recordDelivery($this->code, $order, $this->admin);
    expect($order->promoCodes()->count())->toBe(1)->and(PromotionAuditLog::where('event', 'code.delivered')->count())->toBe(1);
    // A proven historical handover remains valid even without newer activation metadata.
    $this->code->refresh()->update(['activation_mode' => 'legacy', 'activated_at' => null]);
    app(PromotionRegistrationService::class)->register($this->promotion, $this->code->code, $this->identity);
    expect($this->code->fresh()->status)->toBe('registered');
    $other = $this->batch->codes()->where('id', '!=', $this->code->id)->firstOrFail();
    expect(fn () => $service->recordDelivery($other, $order, $this->admin))->toThrow(ValidationException::class);
});

it('rejects linking physical codes to a pending order', function () {
    $permission = Permission::firstOrCreate(['name' => 'orders.view', 'guard_name' => 'web']);
    $this->admin->givePermissionTo($permission);
    $status = OrderStatus::create(['code' => 'pending_payment', 'name' => 'Pendiente']);
    $method = PaymentMethod::create(['code' => 'cash', 'name' => 'Efectivo']);
    $order = Order::create(['number' => (string) Str::uuid(), 'order_status_id' => $status->id,
        'payment_method_id' => $method->id, 'customer_name' => 'Ana', 'customer_email' => 'ana@example.test',
        'customer_phone' => '999999999', 'delivery_address' => [], 'subtotal_amount' => 10000, 'total_amount' => 10000]);
    expect(fn () => app(PromotionService::class)->recordDelivery($this->code, $order, $this->admin))->toThrow(ValidationException::class);
    expect($this->code->fresh()->order_id)->toBeNull();
});

it('rolls the promotion schema back and recreates it on an isolated database', function () {
    $migration = require database_path('migrations/2026_10_16_000001_create_promotion_tables.php');
    $migration->down();
    expect(Schema::hasTable('promo_codes'))->toBeFalse();
    $migration->up();
    expect(Schema::hasTable('promo_codes'))->toBeTrue();
});
