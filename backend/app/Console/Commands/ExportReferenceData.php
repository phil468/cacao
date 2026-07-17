<?php

namespace App\Console\Commands;

use App\Services\DataTransfer\ReferenceDataTransfer;
use Illuminate\Console\Command;

class ExportReferenceData extends Command
{
    protected $signature = 'data:export-reference
        {path : Destination directory for the transfer package}
        {--include-stock : Include current product variant stock balances}';

    protected $description = 'Export production-safe catalog and configuration data without transactional or customer data';

    public function handle(ReferenceDataTransfer $transfer): int
    {
        $result = $transfer->export(
            (string) $this->argument('path'),
            (bool) $this->option('include-stock'),
        );

        $this->info("Reference data package created at {$result['directory']}");
        $this->table(
            ['Data set', 'Rows'],
            collect($result['row_counts'])->map(fn (int $count, string $table) => [$table, $count])->values()->all(),
        );
        $this->line('Stock balances: '.($result['includes_stock'] ? 'included' : 'excluded'));
        $this->line('Assets copied: '.count($result['assets']['exported']));
        if ($result['assets']['missing'] !== []) {
            $this->warn('Missing referenced assets: '.implode(', ', $result['assets']['missing']));
        }

        return self::SUCCESS;
    }
}
