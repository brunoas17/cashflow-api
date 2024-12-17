<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ForceJsonResponseMiddleware;

Route::prefix('v1')->middleware([ForceJsonResponseMiddleware::class])->group(function () {

    Route::get('/', function() {
        return response()->json(['Organiza ai - Em construção' => '0.0.1', 'Laravel' => app()->version()], 200);
    });

    Route::get('/status', StatusController::class);

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'show');
        Route::post('/users', 'post');
    });

});

