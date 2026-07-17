<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class BackupDatabase extends Command
{
    protected $signature = 'deploy:backup {path : Absolute destination path for the SQL dump}';

    protected $description = 'Create a MySQL backup before activating a production release';

    public function handle(): int
    {
        if (config('database.default') !== 'mysql') {
            $this->error('Production backups currently require the MySQL connection.');

            return self::FAILURE;
        }

        $connection = config('database.connections.mysql');
        $destination = (string) $this->argument('path');
        File::ensureDirectoryExists(dirname($destination));
        $optionsFile = tempnam(sys_get_temp_dir(), 'cacao-db-');

        if ($optionsFile === false) {
            $this->error('Could not create a temporary MySQL options file.');

            return self::FAILURE;
        }

        try {
            $escape = static fn (mixed $value): string => str_replace(['\\', '"'], ['\\\\', '\\"'], (string) $value);
            file_put_contents($optionsFile, sprintf("[client]\nhost=\"%s\"\nport=\"%s\"\nuser=\"%s\"\npassword=\"%s\"\n", $escape($connection['host']), $escape($connection['port']), $escape($connection['username']), $escape($connection['password'])));
            chmod($optionsFile, 0600);

            $process = new Process([(string) config('deployment.database_dump_binary'), "--defaults-extra-file={$optionsFile}", '--single-transaction', '--quick', '--routines', '--triggers', (string) $connection['database']]);
            $process->setTimeout(600);
            $stream = fopen($destination, 'wb');

            if ($stream === false) {
                throw new \RuntimeException('Could not open the backup destination.');
            }

            $process->run(static function (string $type, string $buffer) use ($stream): void {
                if ($type === Process::OUT) {
                    fwrite($stream, $buffer);
                }
            });
            fclose($stream);

            if (! $process->isSuccessful()) {
                File::delete($destination);
                $this->error(trim($process->getErrorOutput()) ?: 'Database backup failed.');

                return self::FAILURE;
            }
        } finally {
            File::delete($optionsFile);
        }

        $this->info("Database backup created at {$destination}");

        return self::SUCCESS;
    }
}
