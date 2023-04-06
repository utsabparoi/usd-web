<?php

use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\InvestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DepositsController;
use App\Http\Controllers\Admin\DirectBonusController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('deposits', DepositsController::class);
    Route::resource('directbonus', DirectBonusController::class);
    Route::resource('rank', RankController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('investors', InvestorController::class);
    Route::resource('invest', InvestController::class);
    Route::resource('configuration', ConfigurationController::class);

});
Route::resource('rank', RankController::class);
Route::post('/referCheck', [InvestorController::class, 'referCheck']);
Route::post('/investApprovalChange', [InvestController::class, "InvestApprovalChange"]);
