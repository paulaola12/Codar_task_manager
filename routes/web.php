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
   Route::get('show_login', [AdminController::class, 'show_login'])->name('show.admin.login');
   Route::post('create_admin', [AdminController::class, 'create'])->name('admin.create');
   Route::post('login_user', [AdminController::class, 'login'])->name('login.admin');
   Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
   Route::get('data_page', [AdminController::class, 'show_data_page'])->name('admin.datapage');
   Route::post('change_password', [AdminController::class, 'change_password'])->name('admin.change_password');
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
Route::prefix('intern')->group(function (){
// Route::middleware('auth:intern')->prefix('intern')->group(function () {
Route::get('dashboard', [InternController::class, 'show_dashboard'])->name('intern.dashboard');
Route::post('logout', [InternController::class, 'logout'] )->name('intern.logout');   
Route::get('intern', [InternController::class, 'index'])->name('intern_listing');
Route::post('store', [InternController::class, 'store'])->name('create_intern');
Route::get('create', [InternController::class, 'create'])->name('new_intern');
Route::get('show_login', [InternController::class, 'show_login'])->name('show_login');
Route::post('log_in', [InternController::class, 'login'] )->name('intern_login');
Route::get('data_page', [InternController::class, 'show_data_page'])->name('intern.datapage');
Route::post('change_password', [InternController::class, 'change_password'])->name('intern.change_passwordd');
Route::delete('/{id}', [InternController::class, 'destroy']);
Route::get('/{id}', [InternController::class, 'show']);
Route::put('/{id}', [InternController::class, 'update']);
});
// Route::prefix('intern')->group(function (){


// });


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
    Route::get('show_login', [SupervisorController::class, 'show_login'])->name('supervisor.show.login');
    Route::post('login_supervisor', [SupervisorController::class, 'login'])->name('supervisor.logina');
    Route::post('logout', [SupervisorController::class, 'logout'])->name('supervisor.logout');
    Route::get('supervisor', [SupervisorController::class, 'index'])->name('supervisor_listing');
    Route::get('create', [SupervisorController::class, 'create'])->name('new_supervisor');
    Route::get('dashboard', [SupervisorController::class, 'show_dashboard'])->name('supervisor_dashbaord');
    Route::get('show_task_listing', [SupervisorController::class, 'show_all_task'])->name('show_all_task');
    Route::get('data_page', [SupervisorController::class, 'show_data_page'])->name('supervisor.datapage');
    Route::post('change_password', [AdminController::class, 'change_password'])->name('intern.change_password');
    Route::delete('/{id}', [SupervisorController::class, 'destroy'] );
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
Route::post('/approve_task', [TaskController::class, 'approveTask'])->name('approve-task');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/{id}', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);



// Route::get('/test-supervisor', function () {
//    if (Auth::guard('supervisor')->check()) {
//        return Auth::guard('supervisor')->user();
//    } else {
//        return 'No supervisor logged in';
//    }
// });


// Task controller ends 

require __DIR__.'/auth.php';
