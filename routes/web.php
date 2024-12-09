<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', AdminController::class, 'index');
Route::get('/', [AdminController::class, 'index'])->name('index');



// Project Manager
// Route::get('project_manager/project_listing', [ProjectController::class, 'index'])->name('project_listing');
// Route::get('project_manager/new_project', [ProjectController::class,'create'])->name('new_project');

// // Comopany Controller
// Route::get('/company_manager/company_listing', [CompanyController::class, 'index'])->name('company_listing');
// Route::get('/company_manager/new_company', [CompanyController::class, 'create'])->name('new_companay');