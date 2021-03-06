<?php

use App\Http\Controllers\Adminka\AboutController;
use App\Http\Controllers\Adminka\AuthController;
use App\Http\Controllers\Adminka\MessageController;
use App\Http\Controllers\Adminka\ProjectController;
use App\Http\Controllers\Adminka\SettingController;
use App\Http\Controllers\Adminka\SkillController;
use App\Http\Controllers\Adminka\CategoryController;
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

    Route::resource('skills',           SkillController::class);
    Route::get('/sort',                 [SkillController::class,'sort'])->name('skills.sort');

    Route::get('/messages',             [MessageController::class,'index'])->name('messages');
    Route::get('/message/{id}',         [MessageController::class,'message'])->name('message');
    Route::get('/message/delete/{id}',  [MessageController::class,'destroy'])->name('message.destroy');
    Route::post('/message/send',        [MessageController::class,'send'])->name('message.send');

    Route::resource('projects',       ProjectController::class);
    Route::get('/projects/{id}/media',          [ProjectController::class,'media'])->name('projects.media');
    Route::post('/projects/{id}/media/add',     [ProjectController::class,'media_add'])->name('projects.media.add');
    Route::get('/projects/{id}/media/destroy',  [ProjectController::class,'media_destroy'])->name('projects.media.destroy');
    Route::get('/projects/{id}/media/sort',     [ProjectController::class,'media_sort'])->name('projects.media.sort');

    Route::resource('categories',     CategoryController::class);


});

