<?php

namespace App\Commands;

use Log;
use App\Note;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class CleanCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'clean';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Delete all notes in database.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            Note::whereNotNull('id')->delete();
        } catch (\Throwable $t) {
            $this->error($t->getMessage());
            Log::error($t->getMessage());

            return false;
        }

        $this->info('All notes deleted from database.');
        $this->notify('Notes', 'All notes deleted from database.');

        return true;
    }

    /**
     * Define the command's schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
