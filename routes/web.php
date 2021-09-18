<?php

use App\Http\Controllers\Adminka\AboutController;
use App\Http\Controllers\Adminka\AuthController;
use App\Http\Controllers\Adminka\SettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin','as'=>'admin.'], function(){

    Route::group(['middleware' => 'isLogin' ], function(){
        Route::get('/',                  [AuthController::class,'index'] )->name('login');
        Route::post('/',                 [AuthController::class,'login'] )->name('login.submit');
    });

    Route::group(['middleware' => 'notLogin' ], function(){
        Route::view('/dashboard','dashboard.index')->name('index');

        Route::get('/settings',         [SettingController::class,'index'])->name('settings');
        Route::post('/settings/update', [SettingController::class,'update'])->name('settings.update');

        Route::get('/logout',           [AuthController::class,'logout'] )->name('logout');
    });

    Route::get('/about',                [AboutController::class,'index'])->name('about');
    Route::post('/about',               [AboutController::class,'update'])->name('about.update');

});

