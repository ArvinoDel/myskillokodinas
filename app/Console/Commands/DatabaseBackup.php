<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup {--type=daily}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup Database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $type = $this->option('type');
        $filename = "backup-{$type}-" . Carbon::now()->format('Y-m-d-H-i') . ".sql";
        $command = "mysqldump --user=" . config("database.connections.mysql.username") .
                   " --password=" . config("database.connections.mysql.password") .
                   " --host=" . config("database.connections.mysql.host") .
                   " --column-statistics=0 --no-tablespaces " . config("database.connections.mysql.database") .
                   " > " . storage_path() . "/app/backup/" . $filename;
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Backup failed: ' . implode("\n", $output));
        } else {
            $this->info('Backup completed successfully.');
        }

        // Optional: Clean up old backups if needed
        $this->cleanupOldBackups($type);
    }

    /**
     * Clean up old backups.
     */
    protected function cleanupOldBackups($type)
    {
        $files = Storage::disk('local')->files('backup');
        $threshold = [
            'daily' => Carbon::now()->subDays(7),
            'weekly' => Carbon::now()->subWeeks(4),
            'monthly' => Carbon::now()->subMonths(12),
        ];

        foreach ($files as $file) {
            if (strpos($file, "backup-{$type}-") !== false) {
                $timestamp = str_replace(["backup-{$type}-", ".sql"], "", basename($file));
                $fileDate = Carbon::createFromFormat('Y-m-d-H-i', $timestamp);
                if ($fileDate->lessThan($threshold[$type])) {
                    Storage::disk('local')->delete($file);
                }
            }
        }
    }
}
