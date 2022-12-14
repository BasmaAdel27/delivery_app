<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\CustomerController;


Route::middleware([\App\Http\Middleware\SuperAdmin::class])->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

    Route::resource('drivers', DriverController::class);
    Route::resource('trucks', TruckController::class);
    Route::resource('customers', CustomerController::class);
});

