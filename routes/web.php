<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

Route::get('admin/users/login', [LoginController::class, 'index']);

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login', [LoginController::class, 'accessLogin']);


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #MENU
        Route::prefix('menu')->group(function (){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('add', [MenuController::class, 'list']);
        });
    });

    


});