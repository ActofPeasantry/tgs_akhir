<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AcceptSantriController;
use App\Http\Controllers\AcceptActivityController;
use App\Http\Controllers\AcceptAssetController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityCategoryController;
use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetDetailController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BalanceCategoryController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/password_update', [ProfileController::class, 'password_update'])->name('password_update');
Route::resource('/profile', ProfileController::class)->middleware('auth')->only(['index']);
// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware('auth');

// Route::get('/asset/approve', [AssetController::class, 'approve']);

Route::prefix('admin')->middleware(['auth', 'auth.accessAdmin'])->name('admin.')->group(function(){
    Route::resource('/user', UserController::class);

    Route::patch('/accept_santri/accept_checked', [AcceptSantriController::class, 'accept_checked'])->name('accept_santri.accept_checked');
    Route::patch('/accept_santri/accept/{id}', [AcceptSantriController::class, 'accept'])->name('accept_santri.accept');
    Route::patch('/accept_santri/deny/{id}', [AcceptSantriController::class, 'deny'])->name('accept_santri.deny');
    Route::resource('/accept_santri', AcceptSantriController::class)->only(['index', 'show']);

    Route::patch('/accept_asset/accept_checked', [AcceptAssetController::class, 'accept_checked'])->name('accept_asset.accept_checked');
    Route::patch('/accept_asset/accept/{id}', [AcceptAssetController::class, 'accept'])->name('accept_asset.accept');
    Route::patch('/accept_asset/deny/{id}', [AcceptAssetController::class, 'deny'])->name('accept_asset.deny');
    Route::resource('/accept_asset', AcceptAssetController::class)->only(['index', 'show']);

    Route::patch('/accept_activity/accept_checked', [AcceptActivityController::class, 'accept_checked'])->name('accept_activity.accept_checked');
    Route::patch('/accept_activity/accept/{id}', [AcceptActivityController::class, 'accept'])->name('accept_activity.accept');
    Route::patch('/accept_activity/deny/{id}', [AcceptActivityController::class, 'deny'])->name('accept_activity.deny');
    Route::resource('/accept_activity', AcceptActivityController::class)->only(['index', 'show']);
});

Route::middleware(['auth', 'auth.accessSekre'])->group(function(){
    Route::get('/asset/propose', [AssetController::class, 'propose'])->name('asset.propose');
    Route::get('/activity/propose', [ActivityController::class, 'propose'])->name('activity.propose');
});

Route::middleware(['auth', 'auth.accessJamaah'])->group(function(){
    Route::get('/santri/propose', [SantriController::class, 'propose'])->name('santri.propose');
});

// Route::middleware(['auth', 'auth.accessBendahara'])->group(function(){
// });

Route::middleware(['auth', 'auth.accessAdminAndSekre', 'auth.accessBendahara'])->group(function(){
    Route::resource('/balance', BalanceController::class);
    Route::resource('/balance_categories', BalanceCategoryController::class);
    Route::post('/balance/search', [BalanceController::class, 'search'])->name('balance.search');

    Route::resource('/asset', AssetController::class);
    Route::resource('/asset_categories', AssetCategoryController::class);
    Route::resource('/asset_detail', AssetDetailController::class);

    Route::post('/activity/search', [ActivityController::class, 'search'])->name('activity.search');
    Route::resource('/activity', ActivityController::class);
    Route::resource('/activity_categories', ActivityCategoryController::class);
});

Route::middleware('auth')->group(function(){
    // Route::post('/santri/search', [SantriController::class, 'search'])->name('santri.search');
    Route::resource('/santri', SantriController::class);
});
