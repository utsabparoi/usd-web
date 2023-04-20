<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepositsController;
use App\Http\Controllers\Api\DirectBonusController;
use App\Http\Controllers\Api\Investor;
use App\Http\Controllers\Api\RankController;
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


Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('investor', Investor::class);
    Route::post('/investor_update', [Investor::class, 'investorUpdate']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refer_check', [AuthController::class, 'referCheck']);
Route::get('/deposit_plan', [AuthController::class, 'deposit_plans']);


//Route::apiResource('/rank', RankController::class);
//Route::apiResource('/directbonus', DirectBonusController::class);
//Route::apiResource('/deposits', DepositsController::class);

