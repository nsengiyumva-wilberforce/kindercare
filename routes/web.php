<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PupilsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');//
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('password/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('password/reset', [AuthController::class, 'passwordReset']);
Route::middleware('preventBackHistory','auth:web')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::patch('activate/{pupil}', [PupilsController::class, 'deactivatePupil']);
    Route::resource('admin/dashboard', 'App\Http\Controllers\DashboardController');
    Route::resource('admin/pupil', 'App\Http\Controllers\PupilsController');
    Route::resource('admin/assignment', 'App\Http\Controllers\AssignmentsController');
    Route::resource('admin/score', 'App\Http\Controllers\ScoreController');
    Route::resource('admin/requests', 'App\Http\Controllers\RequestsController'); 
});
