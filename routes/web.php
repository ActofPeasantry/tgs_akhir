<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BalanceCategoriesController;
use App\Http\Controllers\ActivityCategoriesController;

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
Route::resource('/balance_categories', BalanceCategoriesController::class);
Route::resource('/activity_categories', ActivityCategoriesController::class);

