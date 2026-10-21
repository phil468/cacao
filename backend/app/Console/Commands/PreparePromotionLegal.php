<?php

namespace App\Console\Commands;

use App\Models\Promotion;
use App\Services\Promotions\PromotionLegalContent;
use Illuminate\Console\Command;

class PreparePromotionLegal extends Command
{
    protected $signature = 'promotions:prepare-legal {slug=aniversario-2026} {--apply : Replace legal text and deactivate the campaign for review}';

    protected $description = 'Prepare owner-approved campaign conditions without activating the campaign';

    public function handle(PromotionLegalContent $content): int
    {
        $promotion = Promotion::where('slug', $this->argument('slug'))->firstOrFail();
        if (! $this->option('apply')) {
            $this->info('Dry run. Use --apply to replace legal content and deactivate this campaign pending review. Dates and registrations are preserved.');

            return self::SUCCESS;
        }
        $promotion->update(['is_active' => false, 'legal_reviewed' => false, 'terms_content' => $content->terms(), 'privacy_content' => $content->privacy()]);
        $this->info('Legal content updated. Review in admin before activating. No dates or registrations were changed.');

        return self::SUCCESS;
    }
}
