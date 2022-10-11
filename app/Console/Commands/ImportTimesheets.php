<?php

namespace App\Console\Commands;

use App\Actions\ImportTimesheetAction;
use Illuminate\Console\Command;

class ImportTimesheets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:timesheets {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import timesheets in csv format';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start = now();
        if ((new ImportTimesheetAction())(storage_path("app/uploads/{$this->argument('filename')}.csv"))) {
            $this->line('Successfully imported in '.now()->diffInSeconds($start).' seconds');
            return Command::SUCCESS;
        } else {
            $this->line('Import failed in '.now()->diffInSeconds($start).' seconds');
            return Command::FAILURE;
        }
    }
}
