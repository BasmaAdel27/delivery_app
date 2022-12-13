<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DriverController;


Route::middleware([\App\Http\Middleware\SuperAdmin::class])->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

    Route::resource('drivers', DriverController::class);
});

