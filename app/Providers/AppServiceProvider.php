<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS', true);
            \Carbon\Carbon::setLocale('id');
            URL::forceScheme('https');
        } else {
            $this->app['request']->server->set('HTTPS', false);
            \Carbon\Carbon::setLocale('id');
            URL::forceScheme('http');
        }
    }
}
