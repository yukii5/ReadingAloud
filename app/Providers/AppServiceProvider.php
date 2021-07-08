<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Book;
use App\Models\Category;


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
        //全てのメソッドが呼ばれる前に呼ばれるメソッド
        view()->composer('*', function ($view) {
            // get the current user
            $user = \Auth::user();
            
            $categoryModel = new Category();
            $categories = $categoryModel->get();
        $view->with('user', $user)->with('categories', $categories);
        });
        // Schema::defaultStringLength(191);
    }
}
