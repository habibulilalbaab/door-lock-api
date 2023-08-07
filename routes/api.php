<?php

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

Route::post('/doorlock/create-card', [App\Http\Controllers\DoorLockController::class, 'store'])->name('doorlock.create-card');
Route::post('/doorlock/auth', [App\Http\Controllers\APIDoorLockAuthController::class, 'auth'])->name('doorlock.auth');