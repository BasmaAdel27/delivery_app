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
    Route::post('logout',   [AuthController::class, 'logout']);
});


Route::middleware(['auth:sanctum', 'appLocale',\App\Http\Middleware\InActiveStatus::class])->group(function () {
    Route::post('update_user_add_firebase', [AuthController::class, 'addFirebaseToUser']);
    Route::post('update_profile', [AuthController::class, 'updateProfile']);
    Route::get('home', [HomeController::class, 'index']);
    Route::post('user_info', [HomeController::class, 'store']);
});
