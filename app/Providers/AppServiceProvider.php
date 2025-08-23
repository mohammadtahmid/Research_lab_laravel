<?php

namespace App\Providers;

use App\Models\Logo;
use App\Models\Article;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::composer('admin.header', function ($view) {
            $logo = Logo::latest()->first();
            $view->with('logo', $logo);
        });

        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $logo = Logo::latest()->first();
            $view->with('logo', $logo);
        });
    }


}
