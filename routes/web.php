<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
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
});
