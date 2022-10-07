<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('userExist', [IndexController::class, 'userExist'])->name('userExist');
Route::post('emailExist', [IndexController::class, 'emailExist'])->name('emailExist');
Route::get('user/{id}', [IndexController::class, 'getUser'])->name('getUser');
Route::get('getUserReports/{id}', [IndexController::class, 'getUserReports'])->name('getUserReports');
Route::post('deleteReport/{id}', [IndexController::class, 'deleteReport'])->name('deleteReport');
Route::post('getReport', [IndexController::class, 'getReport'])->name('getReport');
Route::post('loginCheck', [IndexController::class, 'loginCheck'])->name('loginCheck');
Route::get('getSettings/{id}', [IndexController::class, 'getSettings'])->name('getSettings');
Route::post('reportElements', [IndexController::class, 'reportElements'])->name('reportElements');
Route::post('getReportElements', [IndexController::class, 'getReportElements'])->name('getReportElements');
Route::get('getUserByToken/{token}', [IndexController::class, 'getUserByToken'])->name('getUserByToken');