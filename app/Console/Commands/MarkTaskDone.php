<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Services\BrandService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkTaskDone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:done-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark tasks with past date as done';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('end_time', '<', Carbon::now())->where('status', '!=', '4')->get();

        foreach ($tasks as $task) {
            $task->status = 4;
            $task->save();
        }

        $this->info(count($tasks).'task(s) updated to Done!');
    }
}
