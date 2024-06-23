<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-complaint', [App\Http\Controllers\ComplaintController::class, 'index']);


