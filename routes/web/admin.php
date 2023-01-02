<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\ReportController;


Route::middleware([\App\Http\Middleware\SuperAdmin::class])->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

    Route::resource('admins', AdminController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('trucks', TruckController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('bills', BillController::class)->except('edit','update','delete');
    Route::put('orders/delivered/{id}', [OrderController::class, 'delivered'])->name('orders.delivered');
    Route::put('orders/rejected/{id}', [OrderController::class, 'rejected'])->name('orders.rejected');
    Route::post('orders/change_driver/{id}', [OrderController::class, 'change_driver'])->name('orders.change_driver');
    Route::get('drivers/financial_dues/{id}', [DriverController::class, 'financial_dues'])->name('drivers.financial_dues');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
});

