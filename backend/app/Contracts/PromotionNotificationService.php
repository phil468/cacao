<?php

namespace App\Contracts;

use App\Models\PromoParticipant;
use App\Models\Promotion;

interface PromotionNotificationService
{
    /** @param list<string> $codes */
    public function sendCodes(Promotion $promotion, PromoParticipant $participant, array $codes): void;

    public function sendWinnerNotification(Promotion $promotion, PromoParticipant $participant): void;
}
