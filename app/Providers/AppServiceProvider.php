<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\StaticPage\StaticPage;
use App\Models\Subscription;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use function PHPUnit\Framework\isEmpty;

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
    public function boot()
    {
    }
}
