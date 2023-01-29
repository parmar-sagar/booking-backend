<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tour;

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
        \View::composer('front/partials/header', function ($view) {
            $tourName= Tour::where('status',1)->take(3)->get();
            $view->with(['tours'=>$tourName]);
        });

        \View::composer('front/partials/footer', function ($view) {
            $tourName= Tour::where('status',1)->take(3)->get();
            $view->with(['tours'=>$tourName]);
        });
    }
}
