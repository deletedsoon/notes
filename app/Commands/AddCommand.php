<?php

namespace App\Commands;

use Log;
use App\Note;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class AddCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'add';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Add new note to database.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        do {
            $title = $this->ask('What is the title?');
        } while (empty($title));

        $description = $this->ask('What is the description?');

        try {
            Note::create([
                'title' => $title,
                'description' => $description,
            ]);
        } catch (\Throwable $t) {
            $this->error($t->getMessage());
            Log::error($t->getMessage());

            return 1;
        }

        $this->info('Note saved to database.');
        $this->notify('Notes', 'Note saved to database.');

        return 0;
    }

    /**
     * Define the command's schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    public function schedule(Schedule $schedule): void
    {
    }
}
