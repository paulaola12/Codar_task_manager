<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupervisorController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// Admin Controller

// Route::middleware('auth:admin')->prefix('admin')->group(function () {
   
// });


Route::get('/', [AdminController::class, 'index'])->name('index');
// Route::get('/Admin/login', [AdminController::class, 'index'])->name('login');

// Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::prefix('admin')->group(function (){
   Route::get('show_register', [AdminController::class, 'show_register'])->name('show_register');
   Route::get('show_login', [AdminController::class, 'show_login'])->name('admin.login');
   Route::post('create_admin', [AdminController::class, 'create'])->name('admin.create');
   Route::post('login_user', [AdminController::class, 'login'])->name('admin.logina');
   Route::post('logout', [AdminController::class, 'logout'])->name('admin.logina');
});

// Route::get('/debug', function () {
//     dd(Auth::guard('')->getProvider());
// });

// Admin Controller ends 



// Company Controller
Route::get('/company_manager/company_listing', [CompanyController::class, 'index'])->name('company_listing');
Route::get('/Company/show', [CompanyController::class, 'create'])->name('new_companay');
Route::post('/Company_manager/store', [CompanyController::class, 'store'])->name('create_company');
Route::get('/company_manager/{id}', [CompanyController::class, 'show']);
Route::put('/company_manager/{id}', [CompanyController::class, 'update']);
Route::delete('/company_manager/{id}', [CompanyController::class, 'destroy']);

// compnay controller ends




// Intern Controller
Route::middleware('auth:intern')->prefix('intern')->group(function () {
Route::get('dashboard', [InternController::class, 'show_dashboard']);
Route::post('logout', [InternController::class, 'logout'] )->name('intern.logout');   
});

Route::prefix('intern')->group(function (){
Route::get('intern', [InternController::class, 'index'])->name('intern_listing');
Route::post('store', [InternController::class, 'store'])->name('create_intern');
Route::get('create', [InternController::class, 'create'])->name('new_intern');
Route::get('show_login', [InternController::class, 'show_login'])->name('show_login');
Route::post('log_in', [InternController::class, 'login'] )->name('intern_login');

Route::get('/{id}', [InternController::class, 'show']);
Route::put('/{id}', [InternController::class, 'update']);

});


// intern controller ends






// Project Controller
Route::get('/project_manager/project_listing', [ProjectController::class, 'index'])->name('project_listing');
Route::get('/project_manager/create', [ProjectController::class, 'create'])->name('new_project');
Route::post('/project_manager/store', [ProjectController::class, 'store'])->name('create_project');
Route::get('/project_manager/getProject', [ProjectController::class, 'getProjectDetails']);
Route::get('/projects/{id}', [ProjectController::class, 'edit']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
// project controller ends



// Supervisor Controller

// Route::middleware('auth:supervisor')->prefix('supervisor')->group(function () {
  
// });
Route::prefix('supervisor')->group(function (){
    Route::get('supervisor_register', [SupervisorController::class, 'show_register'])->name('show_supervisor_register');
    Route::post('store', [SupervisorController::class, 'store'])->name('create_supervisor');
    Route::get('show_login', [SupervisorController::class, 'show_login'])->name('supervisor.login');
    Route::post('login_supervisor', [SupervisorController::class, 'login'])->name('supervisor.logina');
    Route::post('logout', [SupervisorController::class, 'logout'])->name('supervisor.logout');
    Route::get('supervisor', [SupervisorController::class, 'index'])->name('supervisor_listing');
    Route::get('create', [SupervisorController::class, 'create'])->name('new_supervisor');
    Route::get('dashboard', [SupervisorController::class, 'show_dashboard']);
    Route::get('/{id}', [SupervisorController::class, 'show']);
    Route::put('/{id}', [SupervisorController::class, 'update']);

    // Route::get('login', [AdminController::class, 'show_login'])->name('admin.login');
    // Route::post('create', [AdminController::class, 'create'])->name('admin.create');
    // Route::post('login_user', [AdminController::class, 'login'])->name('admin.logina');
 });

// supercisor controller ends





// Task Controller 
Route::get('/task_manager/task_listing', [TaskController::class, 'index'])->name('task_listing');
Route::get('/task_manager/create', [TaskController::class, 'create'])->name('new_task');
Route::post('/task_manager/store', [TaskController::class, 'store'])->name('create_task');
Route::get('/task_manager/{project_name}', [TaskController::class, 'show']);
Route::post('/update_task_status', [TaskController::class, 'updateStatus'])->name('update_task_status');
Route::get('/tasks/{id}', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);

// Task controller ends 

require __DIR__.'/auth.php';
