<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(['Organiza ai - Em construção' => '0.0.1', 'Laravel' => app()->version()]);
});
