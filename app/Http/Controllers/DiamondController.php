<?php

namespace App\Http\Controllers;

use App\Exports\DiamondsExport;
use App\Http\Requests\DiamondFormRequest;
use App\Imports\DiamondsImport;
use App\Jobs\DiamondExport;
use App\Jobs\DiamondImport;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Jobs\NotifyUserOfCompletedImport;
use App\Models\Diamond;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Throwable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class DiamondController extends Controller
{
    public function index() {
        return view('welcome');
    }


    public function getDiamonds(Request $request) {

        $data = Diamond::query();
        return FacadesDataTables::of($data)
            ->setTotalRecords(10)
            ->toJson();

    }
    
    
    public function store(Request $request) {

        if ($request->has('csv')) {

            $csv = file($request->csv);
            $chunks = array_chunk($csv, 10000);

            $header = [];
            $batch  = Bus::batch([])
            ->then(function (Batch $batch) {
                // All jobs completed successfully...

            })->catch(function (Batch $batch, Throwable $e) {
                // First batch job failure detected...

            })->finally(function (Batch $batch) {
                // The batch has finished executing...

            })->name('Import CSV')->dispatch();

            foreach ($chunks as $key => $chunk) {

                $data = array_map('str_getcsv', $chunk);

                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                if ($batch->cancelled()) {
                    // Determine if the batch has been cancelled...
                    return;
                }

                $batch->add(new DiamondImport($data, $header));
            }

            return $batch;
        }

        return "please upload csv file";
    }


    public function import(DiamondFormRequest $request) 
    {

        (new DiamondsImport)->queue(request()->file('csv'))->chain([
            new NotifyUserOfCompletedImport("medsonnaftal@gmail.com"),
        ]);
        
        return redirect('/')->with('success', 'Success, The import will done on background. You will get email once it complete!');
    }

    public function export() 
    {
        $batch = Bus::batch([
            new DiamondExport(),
        ])->dispatch();

        return redirect('/')->with('success', 'Success, The export will done on background. You will get email once it complete!');

    }
}
