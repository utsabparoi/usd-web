<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepositsController;
use App\Http\Controllers\Api\DirectBonusController;
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

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/investors', [AuthController::class, 'investors']);
Route::get('/deposit_plan', [AuthController::class, 'deposit_plans']);
Route::get('/logout', [AuthController::class, 'logout']);

//Route::post('login', [AuthController::class, 'login']);
//Route::apiResource('/rank', RankController::class);
//Route::apiResource('/directbonus', DirectBonusController::class);
//Route::apiResource('/deposits', DepositsController::class);
