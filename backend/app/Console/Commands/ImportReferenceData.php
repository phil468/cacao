<?php

namespace App\Console\Commands;

use App\Services\DataTransfer\ReferenceDataTransfer;
use Illuminate\Console\Command;
use Throwable;

class ImportReferenceData extends Command
{
    protected $signature = 'data:import-reference
        {path : Directory containing reference-data.json}
        {--apply : Apply the import; without this option the command only inspects the package}
        {--backup-confirmed : Confirm that a current production database backup exists}';

    protected $description = 'Inspect or import a production-safe reference data package';

    public function handle(ReferenceDataTransfer $transfer): int
    {
        try {
            $inspection = $transfer->inspect((string) $this->argument('path'));
        } catch (Throwable $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        $this->info('Reference data package');
        $this->line('Generated at: '.($inspection['generated_at'] ?? 'unknown'));
        $this->line('Source environment: '.($inspection['source_environment'] ?? 'unknown'));
        $this->line('Stock balances: '.($inspection['includes_stock'] ? 'included' : 'excluded'));
        $this->table(
            ['Data set', 'Rows'],
            collect($inspection['row_counts'])->map(fn (int $count, string $table) => [$table, $count])->values()->all(),
        );
        $this->comment('Excluded: '.implode(', ', $inspection['excluded_data']));

        if (! $this->option('apply')) {
            $this->warn('Dry run only. Add --apply after reviewing this summary.');

            return self::SUCCESS;
        }

        if (app()->environment('production') && ! $this->option('backup-confirmed')) {
            $this->error('Production import refused: create a database backup and add --backup-confirmed.');

            return self::FAILURE;
        }

        if (! $this->confirm('Apply this package to the current database?', false)) {
            $this->warn('Import cancelled.');

            return self::SUCCESS;
        }

        try {
            $result = $transfer->import((string) $this->argument('path'));
        } catch (Throwable $exception) {
            report($exception);
            $this->error("Import rolled back: {$exception->getMessage()}");

            return self::FAILURE;
        }

        $this->info('Reference data imported successfully.');
        $this->table(
            ['Data set', 'Processed'],
            collect($result['row_counts'])->map(fn (int $count, string $table) => [$table, $count])->values()->all(),
        );

        return self::SUCCESS;
    }
}
