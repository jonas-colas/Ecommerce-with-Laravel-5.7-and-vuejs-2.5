<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Schema;
use View;
use App\Category;
use App\Post;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
      Schema::defaultStringLength(191);
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('created_at', 'desc')->get());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
