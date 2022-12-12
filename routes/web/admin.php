<?php


use Illuminate\Support\Facades\Route;



Route::get('dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('dashboard');

