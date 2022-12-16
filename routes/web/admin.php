<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;


Route::middleware([\App\Http\Middleware\SuperAdmin::class])->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

    Route::resource('drivers', DriverController::class);
    Route::resource('trucks', TruckController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::put('orders/delivered/{id}', [OrderController::class, 'delivered'])->name('orders.delivered');
    Route::put('orders/rejected/{id}', [OrderController::class, 'rejected'])->name('orders.rejected');
});

