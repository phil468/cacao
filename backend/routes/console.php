<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('sanctum:prune-expired --hours=24')->daily();
Schedule::command('promotions:anonymize --apply')->dailyAt('03:30')->timezone('America/Lima')->withoutOverlapping();
