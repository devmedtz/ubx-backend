<?php

namespace App\Jobs;

use App\Models\Diamond;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DiamondImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public $header;
    public $data;

    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * Execute the job.
     */
    public function handle()
    {
        // echo json_encode($this->data) . PHP_EOL;

        foreach ($this->data as $diamond) {
            $diamondData = array_combine($this->header, $diamond);
            Diamond::updateOrCreate($diamondData);
        }

        echo "Excel import successfully" . PHP_EOL;
    }
}
