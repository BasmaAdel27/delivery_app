<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Order $order)
    {
        Schema::defaultStringLength(191);
        $drivers=User::whereHas('truck',fn($q) => $q->where('user_id','!=',null))
              ->orwhereHas('truck',fn($q) => $q->where('user_id',$order->driver?->id))
              ->select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))->pluck('name', 'id');
        View::share('drivers', $drivers);

    }
}
