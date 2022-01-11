<?php

namespace App\Providers;

use App\Models\Category;
use View;
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
       // View::share('name','Nirob'); for All Page
        View::composer('front.includes.header',function ($view){
            $view->with('categories', Category::all());
        });
    }
}
