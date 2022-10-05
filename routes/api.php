<?php

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('userExist', [IndexController::class, 'userExist'])->name('userExist');

Route::get('user/{id}', [IndexController::class, 'getUser'])->name('getUser');
Route::get('getUserReports/{id}', [IndexController::class, 'getUserReports'])->name('getUserReports');
Route::post('deleteReport/{id}', [IndexController::class, 'deleteReport'])->name('deleteReport');
Route::post('getReport', [IndexController::class, 'getReport'])->name('getReport');
Route::post('loginCheck', [IndexController::class, 'loginCheck'])->name('loginCheck');
Route::get('getSettings/{id}', [IndexController::class, 'getSettings'])->name('getSettings');