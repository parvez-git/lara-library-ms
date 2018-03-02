<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('books','BooksController');
Route::resource('authors','AuthorsController');
Route::resource('countries','CountriesController');
Route::resource('languages','LanguagesController');
Route::resource('series','SeriesController');
Route::resource('publishers','PublishersController');
Route::resource('genres','GenresController');


Route::group(['middleware' => ['web','roles'], 'roles'=>['Admin']], function () {
  Route::get('/home1', function(){
    echo 'Hello Admin';
  });
});
