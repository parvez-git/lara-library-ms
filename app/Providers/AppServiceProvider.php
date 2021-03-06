<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Publisher;
use App\Language;
use App\Author;
use App\Genre;
use App\Book;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {

            $setting   = Setting::firstOrFail();
            $site_name = ($setting) ? $setting['site_name'] : 'Library';
            view()->share('sitename',$site_name);

            view()->composer('frontend.search', function($view) {
                $view->with('publishedyears', Book::select('published_year')->distinct()->get());
            });

            view()->composer(['frontend.archive','frontend.search'], function($view) {
                $view->with('publishers', Publisher::has('book')->select('id','name','slug')->get());
                $view->with('authors', Author::has('book')->select('id','name','slug')->get());
                $view->with('genres', Genre::has('books')->select('id','name','slug')->get());
                $view->with('languages', Language::has('book')->select('id','name','slug')->get());
            });
            
        }
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
