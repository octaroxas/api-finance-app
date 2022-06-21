<?php

use App\Http\Controllers\API\Account\AccountController;
use App\Http\Controllers\API\Auth\RegisteredUserController;
use App\Http\Controllers\API\Auth\SessionController;
use App\Http\Controllers\API\Transaction\CategoryController;
use App\Http\Controllers\API\Transaction\TransactionController;
use App\Http\Controllers\API\Wallet\WalletController;
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

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [SessionController::class, 'destory'])->name('session.destory');
        Route::apiResource('account', AccountController::class)->except(['index', 'destroy']);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('wallet', WalletController::class);
        Route::apiResource('transaction', TransactionController::class);
    });
});
