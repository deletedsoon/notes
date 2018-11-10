<?php

namespace App\Commands;

use Log;
use App\Note;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class ShowCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'show';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Show all notes or single note.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['ID', 'Title', 'Description', 'Created At', 'Updated At'];

        try {
            $notes = Note::all()->toArray();
            $this->table($headers, $notes);
        } catch (\Throwable $t) {
            $this->error($t->getMessage());
            Log::error($t->getMessage());

            return 1;
        }

        $this->info('Notes successfully loaded from database.');

        return 0;
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
