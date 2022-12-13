<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
      'register' => false,
      'verify' => false,
]);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['SuperAdmin'])->name('home');
Route::group(
      [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
      ],
      function () {
          Route::group([
                'as' => 'admin.',
                'prefix' => 'admin',
                'middleware' => ['auth'],
          ], function () {
              require('web/admin.php');
          });

      }
);


