<?php

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


use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\SAWController;

Route::resource('kriteria', KriteriaController::class);
Route::resource('alternatif', AlternatifController::class);
Route::get('saw', [SAWController::class, 'index'])->name('rank');


use App\Http\Controllers\SessionController;
Route::get('/sesi/register', [SessionController::class, 'register'])->name('register');
Route::post('register', [SessionController::class, 'register_action'])->name('register.action');
Route::get('/', [SessionController::class, 'login'])->name('login');
Route::post('login', [SessionController::class, 'login_action'])->name('login.action');

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index']);



