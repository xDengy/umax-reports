<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;

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

Route::get('/{any}', [IndexController::class, 'renderMain'])->where('any','.*');

Route::post('/register', [IndexController::class, 'register'])->name('register');
Route::post('/newReport', [IndexController::class, 'newReport'])->name('newReport');
Route::post('/report', [IndexController::class, 'newReport'])->name('report');
Route::post('/login', [IndexController::class, 'login'])->name('login');
Route::post('/exit', [IndexController::class, 'exit'])->name('exit');
Route::post('/settings', [IndexController::class, 'settings'])->name('settings');
Route::post('/personal', [IndexController::class, 'personal'])->name('personal');