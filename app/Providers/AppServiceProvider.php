<?php

namespace App\Providers;

use App\AppSetting;
use App\Settings\Settings;
use App\Thumbnailer\Thumbnailer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('app-settings', function () {
            return new Settings(AppSetting::first());
        });

        $this->app->singleton('thumbnailer', function () {
            return new Thumbnailer(config('thumbnailer'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
