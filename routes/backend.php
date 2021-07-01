<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminAuth;
use Illuminate\Support\Facades\Config;

Route::get('/login', [AdminAuth::class, 'login'])->name('login');
Route::post('/login', [AdminAuth::class, 'doLogin'])->name('goLogin');
Config::set('auth.defines', 'admin');

Route::group(['middleware' => 'admin:admin'], function () {

    Route::get('/', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');

    Route::resource('admins', AdminController::class);
    Route::resource('roles', \App\Http\Controllers\Backend\RoleController::class);

    Route::post('/logout', [AdminAuth::class, 'logout'])->name('logout');
});
