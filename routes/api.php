<?php

use App\Http\Controllers\API\Auth\SessionController;
use App\Http\Controllers\API\Transaction\TransactionController;
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


Route::prefix('v1')->group(function () {

    Route::post('login', [SessionController::class, 'store'])->name('session.store');

    Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('wallet', TransactionController::class);
        Route::apiResource('transaction', TransactionController::class);
    });
});
