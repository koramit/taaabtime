<?php

namespace App\Providers;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Hashids::class, fn () => new Hashids(salt: config('app.key')));
    }

    public function boot(): void
    {
        //
    }
}
