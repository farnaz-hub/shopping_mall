<?php

namespace App\Jobs;

use App\Imports\UserImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportUsersJob implements ShouldQueue
{
    use Queueable, SerializesModels, Dispatchable, InteractsWithQueue;

    /**
     * Create a new job instance.
     */

    protected $filePath;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new UserImport(), $this->filePath);
    }
}
