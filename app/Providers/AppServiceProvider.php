<?php

namespace App\Providers;
use View;
use App\Category;
use App\Brand;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.includes.header',function($view){
        $view->with('categories',Category::where('optradio',1)->get());

        });

        View::composer('frontend.includes.footer',function($view){
        $view->with('brands',Brand::where('optradio',1)->take(4)->get());

        });


      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
