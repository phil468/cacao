<?php

namespace App\Console\Commands;

use App\Models\PromoParticipant;
use App\Models\Promotion;
use App\Models\PromotionAuditLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AnonymizePromotionParticipants extends Command
{
    protected $signature = 'promotions:anonymize {--apply : Irreversibly remove expired campaign participant identity}';

    protected $description = 'Preview or anonymize participants 12 months after the prize-claim deadline, respecting legal holds';

    public function handle(): int
    {
        foreach (Promotion::where('is_active', false)->where('retention_hold', false)->whereNotNull('draw_at')->cursor() as $promotion) {
            DB::transaction(function () use ($promotion): void {
                $campaign = Promotion::whereKey($promotion->id)->lockForUpdate()->firstOrFail();
                if ($campaign->is_active || $campaign->retention_hold || ! $campaign->draw_at
                    || ! $campaign->draw_at->copy()->timezone('America/Lima')->addDays(15)->endOfDay()->addMonthsNoOverflow(12)->isPast()) {
                    return;
                }
                $query = PromoParticipant::where('promotion_id', $campaign->id)->whereNull('anonymized_at');
                $count = $query->count();
                $this->line('Campaign '.$campaign->id.': '.$count.' expired participant(s).');
                if (! $this->option('apply') || $count === 0) {
                    return;
                }
                foreach ($query->lockForUpdate()->get() as $participant) {
                    $participant->update(['full_name' => 'Participante anonimizado', 'email' => 'removed-'.$participant->id.'@example.invalid',
                        'phone' => '', 'ip_address' => null, 'user_agent' => null, 'marketing_consent' => false,
                        'marketing_consent_at' => null, 'anonymized_at' => now()]);
                }
                PromotionAuditLog::create(['promotion_id' => $campaign->id, 'event' => 'participants.anonymized', 'context' => ['count' => $count]]);
            });
        }

        return self::SUCCESS;
    }
}
