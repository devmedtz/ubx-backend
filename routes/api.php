<?php

use App\Http\Controllers\DiamondController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'v1'], function(){
    Route::apiResource('diamonds', DiamondController::class);
    Route::post('import', [DiamondController::class, 'import']);
    Route::get('export', [DiamondController::class, 'export']);
});
