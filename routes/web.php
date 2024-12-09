<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', AdminController::class, 'index');
Route::get('/', [AdminController::class, 'index'])->name('index');