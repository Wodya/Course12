<?php

namespace App\Providers;

use App\Service\AuthService;
use App\Service\NewsService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind( AuthService::class,function (){
            return new AuthService();
        });
        $this->app->bind( NewsService::class,function (){
            return new NewsService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Paginator::useBootstrap();
    }
}
