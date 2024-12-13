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
Route::post('create_project', [ProjectController::class, 'store'])->name('create_project');
// Route::get('/project-form/{project_name}', [ProjectController::class, 'getProjectDetails'])->name('task.form');
Route::get('/projects', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}', [ProjectController::class, 'edit'])->name('project_edit');
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);





// // Comopany Controller
Route::get('/company_manager/company_listing', [CompanyController::class, 'index'])->name('company_listing');
Route::get('/company_manager/new_company', [CompanyController::class, 'create'])->name('new_companay');
Route::post('/create_company', [CompanyController::class, 'store'])->name('create_company');
Route::get('/company_manager/{id}', [CompanyController::class, 'show'])->name('show.company');
Route::put('/company_manager/{id}', [CompanyController::class, 'update'])->name('update.company');
Route::delete('/company_manager/{id}', [CompanyController::class, 'destroy'])->name('destroy.company');
// Route::get('/single-products/{id}', [productController::class, 'show'])->name('single-product');
// Task Manager

Route::get('/task_manager/task_listing', [TaskController::class, 'index'])->name('task_listing');
Route::get('/task_manager/new_task', [TaskController::class, 'create'])->name('new_task');
Route::get('/task_manager/{project_name}', [TaskController::class, 'show'])->name('new_show');
Route::post('/task_manager/create', [ TaskController::class, 'store'])->name('create_task');
Route::get('/tasks/{id}', [ TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);

// Intern Manager

Route::get('/intern_manager/intern', [InternController::class, 'index'])->name('intern_listing');
Route::get('/intern_manager/new_intern', [InternController::class, 'create'])->name('new_intern');
// Route::post('/create', [InternController::class, 'store'])->name('cre_intern');
Route::post('/intern/create', [ InternController::class, 'store'])->name('create_intern');
Route::get('/intern/{id}', [InternController::class,'show'])->name('intern_show');
Route::put('/intern/{id}', [InternController::class, 'update']);


// Supervisor Manager 

Route::get('/supervisor_manager/supervisor', [SupervisorController::class, 'index'])->name('Supervisor_listing');
Route::get('/supervisor_manager/new_supervisor', [SupervisorController::class, 'create'])->name('new_supervisor');
Route::post('/create', [SupervisorController::class, 'store'])->name('create_supervisor');
Route::get('/supervisor/{id}', [SupervisorController::class, 'show']);
Route::put('/supervisor/{id}', [SupervisorController::class, 'update']);