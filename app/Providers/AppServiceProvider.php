<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Publisher;
use App\Author;
use App\Genre;
use App\Book;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.search', function($view) {
            $view->with('publishers', Publisher::select('id','name')->get());
            $view->with('authors', Author::select('id','name')->get());
            $view->with('genres', Genre::select('id','name','slug')->get());
            $view->with('publishedyears', Book::select('published_year')->distinct()->get());
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
