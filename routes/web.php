<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ToursController;
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
Route::group(['middleware' => ['auth:admin']], function () { 
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',[DashboardController::class, 'index']);
    });

    Route::prefix('admin')->middleware('auth:admin')->group(function(){
        Route::get('/users',[UsersController::class, 'index']); 
        Route::get('/datatables',[UsersController::class, 'datatable']);
        Route::get('/create',[UsersController::class, 'create']);
        Route::Post('/store',[UsersController::class, 'create']);
        Route::get('/delete/{id}',[UsersController::class, 'destroy']);
        Route::get('/edit/{id}',[UsersController::class, 'edit']);
        Route::post('/update/{id}',[UsersController::class, 'edit']);
    });

    Route::prefix('admin/tours')->group(function(){
        Route::get('/',[ToursController::class, 'index']); 
        Route::get('/datatables',[ToursController::class, 'datatable']);
        Route::get('/create',[ToursController::class, 'create']);
        Route::Post('/store',[ToursController::class, 'create']);
        Route::get('/delete/{id}',[ToursController::class, 'destroy']);
        Route::get('/edit/{id}',[ToursController::class, 'edit']);
        Route::post('/update/{id}',[ToursController::class, 'edit']);
    });
});    
