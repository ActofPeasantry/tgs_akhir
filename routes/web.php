<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BalanceCategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetDetailController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityCategoryController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\userController;



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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('dashboard');
});
// Route::get('/asset/approve', [AssetController::class, 'approve']);
Route::middleware(['auth', 'auth.accessAdmin'])->group(function(){
    Route::resource('/user', UserController::class);
});

Route::middleware(['auth', 'auth.accessJamaah'])->group(function(){
    Route::resource('/santri', SantriController::class);
});

Route::middleware(['auth', 'auth.accessAdmin', 'auth.accessSekre'])->group(function(){
    Route::resource('/balance', BalanceController::class);
    Route::resource('/balance_categories', BalanceCategoryController::class);
    Route::resource('/asset', AssetController::class);
    Route::resource('/asset_categories', AssetCategoryController::class);
    Route::resource('/asset_detail', AssetDetailController::class);
    Route::resource('/activity', ActivityController::class);
    Route::resource('/activity_categories', ActivityCategoryController::class);
});

