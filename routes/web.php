<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard1');
//     })->name('dashboard1');
// });




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


