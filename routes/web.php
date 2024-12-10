<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupervisorController;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', AdminController::class, 'index');
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/admin/register', [ AdminController::class, 'register'])->name('register');



// Project Manager
Route::get('project_manager/project_listing', [ProjectController::class, 'index'])->name('project_listing');
Route::get('project_manager/new_project', [ProjectController::class,'create'])->name('new_project');

// // Comopany Controller
Route::get('/company_manager/company_listing', [CompanyController::class, 'index'])->name('company_listing');
Route::get('/company_manager/new_company', [CompanyController::class, 'create'])->name('new_companay');

// Task Manager

Route::get('/task_manager/task', [TaskController::class, 'index'])->name('task_listing');
Route::get('/task_manager/new_task', [TaskController::class, 'create'])->name('new_task');

// Intern Manager

Route::get('/intern_manager/intern', [InternController::class, 'index'])->name('intern_listing');
Route::get('/intern_manager/new_inter', [InternController::class, 'create'])->name('new_intern');

// Supervisor Manager 

Route::get('/supervisor_manager/supervisor', [SupervisorController::class, 'index'])->name('Supervisor_listing');
Route::get('/supervisor_manager/new_supervisor', [SupervisorController::class, 'create'])->name('new_supervisor');