<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->utype==='AD';
        });

        Gate::define('author', function (User $user) {
            return $user->utype==='AU';
        });
        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
        Blade::if('author', function () {
            return request()->user()?->can('author');
        });
        Paginator::useBootstrap();
    }
}
