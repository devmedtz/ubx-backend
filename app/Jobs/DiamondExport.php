<?php

namespace App\Jobs;

use App\Exports\DiamondsExport;
use App\Mail\DiamondExportEmail;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class DiamondExport implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    
    public $timeout = 120;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "start" .PHP_EOL;

        $file = uniqid() . '.'. 'csv';

        (new DiamondsExport)->store($file, 'public', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);

        $location = config('app.base_url') . '/uploads/'. $file;


        $data = [
            'email' => 'medsonnaftal@gmail.com',
            'link' => $location
        ];

        Mail::to($data['email'])->send(new DiamondExportEmail($data));

        echo "end" .PHP_EOL;
    }
}
