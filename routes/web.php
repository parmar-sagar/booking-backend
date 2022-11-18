<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\VehiclesController;
use App\Http\Controllers\Admin\IncludeController;
use App\Http\Controllers\Admin\HighlightController;
use App\Http\Controllers\Admin\WarningController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeTourController;
use App\Http\Controllers\Admin\TimeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/dashboard',[DashboardController::class, 'index']);

    Route::group([
        'prefix' => 'users'
    ], function(){
        Route::get('/',[UserController::class, 'index']);
        Route::get('/datatable',[UserController::class, 'datatable']);
        Route::get('/create',[UserController::class, 'create']);
        Route::post('/store',[UserController::class, 'create']);
        Route::get('/edit/{id}',[UserController::class, 'edit']);
		Route::post('/update/{id}',[UserController::class, 'edit']);
		Route::get('/delete/{id}',[UserController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'tours'
    ], function(){
        Route::get('/',[TourController::class, 'index']);
        Route::get('/datatable',[TourController::class, 'datatable']);
        Route::get('/create',[TourController::class, 'create']);
        Route::post('/store',[TourController::class, 'create']);
        Route::get('/edit/{id}',[TourController::class, 'edit']);
		Route::post('/update/{id}',[TourController::class, 'edit']);
		Route::get('/delete/{id}',[TourController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'includes'
    ], function(){
        Route::get('/',[IncludeController::class, 'index']);
        Route::get('/datatable',[IncludeController::class, 'datatable']);
        Route::get('/create',[IncludeController::class, 'create']);
        Route::post('/store',[IncludeController::class, 'create']);
        Route::get('/edit/{id}',[IncludeController::class, 'edit']);
		Route::post('/update/{id}',[IncludeController::class, 'edit']);
		Route::get('/delete/{id}',[IncludeController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'highlights'
    ], function(){
        Route::get('/',[HighlightController::class, 'index']);
        Route::get('/datatable',[HighlightController::class, 'datatable']);
        Route::get('/create',[HighlightController::class, 'create']);
        Route::post('/store',[HighlightController::class, 'create']);
        Route::get('/edit/{id}',[HighlightController::class, 'edit']);
		Route::post('/update/{id}',[HighlightController::class, 'edit']);
		Route::get('/delete/{id}',[HighlightController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'warnings'
    ], function(){
        Route::get('/',[WarningController::class, 'index']);
        Route::get('/datatable',[WarningController::class, 'datatable']);
        Route::get('/create',[WarningController::class, 'create']);
        Route::post('/store',[WarningController::class, 'create']);
        Route::get('/edit/{id}',[WarningController::class, 'edit']);
		Route::post('/update/{id}',[WarningController::class, 'edit']);
		Route::get('/delete/{id}',[WarningController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'vehicles'
    ], function(){
        Route::get('/',[VehiclesController::class, 'index']);
        Route::get('/datatable',[VehiclesController::class, 'datatable']);
        Route::get('/create',[VehiclesController::class, 'create']);
        Route::post('/store',[VehiclesController::class, 'create']);
        Route::get('/edit/{id}',[VehiclesController::class, 'edit']);
		Route::post('/update/{id}',[VehiclesController::class, 'edit']);
		Route::get('/delete/{id}',[VehiclesController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'coupons'
    ], function(){
        Route::get('/',[CouponController::class, 'index']);
        Route::get('/datatable',[CouponController::class, 'datatable']);
        Route::get('/create',[CouponController::class, 'create']);
        Route::post('/store',[CouponController::class, 'create']);
        Route::get('/edit/{id}',[CouponController::class, 'edit']);
		Route::post('/update/{id}',[CouponController::class, 'edit']);
		Route::get('/delete/{id}',[CouponController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'home-tours'
    ], function(){
        Route::get('/',[HomeTourController::class, 'index']);
        Route::get('/datatable',[HomeTourController::class, 'datatable']);
        Route::get('/create',[HomeTourController::class, 'create']);
        Route::post('/store',[HomeTourController::class, 'create']);
        Route::get('/edit/{id}',[HomeTourController::class, 'edit']);
		Route::post('/update/{id}',[HomeTourController::class, 'edit']);
		Route::get('/delete/{id}',[HomeTourController::class, 'destroy']);
    });

    Route::group([
        'prefix' => 'times'
    ], function(){
        Route::get('/',[TimeController::class, 'index']);
        Route::get('/datatable',[TimeController::class, 'datatable']);
        Route::get('/create',[TimeController::class, 'create']);
        Route::post('/store',[TimeController::class, 'create']);
        Route::get('/edit/{id}',[TimeController::class, 'edit']);
		Route::post('/update/{id}',[TimeController::class, 'edit']);
		Route::get('/delete/{id}',[TimeController::class, 'destroy']);
    });
});