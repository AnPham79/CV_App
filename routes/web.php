<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function() {
    return redirect()->route('jobs.index');
});

// sử dụng only để giới hạn các hành động action được cung cấp bởi
// controller resource

Route::resource('jobs', JobController::class)
            ->only(['index', 'show']);

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');

    Route::post('process-login', [AuthController::class, 'processLogin'])->name('process-login');
    
    Route::get('register', [AuthController::class, 'register'])->name('register');
    
    Route::post('process-register', [AuthController::class, 'processRegister'])->name('process-register');

    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)->only([
        'create', 'store'
    ]);

    Route::middleware('employer')->resource('my-jobs', MyJobController::class);
});

