<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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

});