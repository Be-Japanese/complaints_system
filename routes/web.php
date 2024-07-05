<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/complaint', function (Request $request) {
    return view('pages.complaint', [
        'title' => $request->query('title'),
        'category' => $request->query('category'),
    ]);
})->name('new-complaint');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name(
//        'profile.edit',
//    );
//    Route::patch('/profile', [ProfileController::class, 'update'])->name(
//        'profile.update',
//    );
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
//        'profile.destroy',
//    );
//});

//require __DIR__ . '/auth.php';
