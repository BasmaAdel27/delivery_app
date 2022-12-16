<?php


use App\Http\Controllers\Api\{
      AuthController,
      HomeController,

};
use Illuminate\Support\Facades\Route;

Route::middleware('GrahamCampbell\Throttle\Http\Middleware\ThrottleMiddleware:3,1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});


Route::middleware(['auth:sanctum', 'appLocale'])->group(function () {
    Route::get('home', [HomeController::class, 'index']);
    Route::post('update_order', [HomeController::class, 'updateOrder']);
});
