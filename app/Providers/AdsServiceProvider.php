<?php

namespace App\Providers;

//use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Components\Ads;

class AdsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // App::bind('ads', function()
        // {
        //     return new \App\Components\Ads;
        // });
        $this->app->bind('ads', function($app) {
            return new Ads($app);
        });
        // $this->app->booting(function()
        //   {
        //       $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        //       $loader->alias('Ads', 'App\Components\Ads');
        //   });
    }
}
