<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BalanceCategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetDetailController;
use App\Http\Controllers\ActivityCategoryController;

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

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/debet_kredit', function () {
//     return view('backend.balance.index');
// });
Route::resource('/balance', BalanceController::class);
Route::resource('/balance_categories', BalanceCategoryController::class);
Route::resource('/asset', AssetController::class);
Route::resource('/asset_categories', AssetCategoryController::class);
Route::resource('/asset_detail', AssetDetailController::class);
Route::resource('/activity_categories', ActivityCategoryController::class);

