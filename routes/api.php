<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::prefix('v1')->group(function () {

    Route::get('/', function() {
        return response()->json(['Organiza ai - Em construção' => '0.0.1', 'Laravel' => app()->version()], 200);
    });

    Route::get('/status', StatusController::class);

});

