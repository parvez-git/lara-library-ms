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



<<<<<<< HEAD
// Auth::routes();
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
=======
Auth::routes();
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('books','BooksController');
Route::resource('authors','AuthorsController');
Route::resource('countries','CountriesController');
Route::resource('languages','LanguagesController');
Route::resource('series','SeriesController');
Route::resource('publishers','PublishersController');
Route::resource('genres','GenresController');

<<<<<<< HEAD
Route::resource('users','UsersController');
Route::resource('issuedbooks','IssuedbooksController');
Route::get('issuedbooksusers-json','IssuedbooksController@issuedbooksUsers')->name('issuedbooksusers');
Route::post('issuedbookstatus-json','IssuedbooksController@issuedbookStatusUpdate')->name('issuedbookstatus');


Route::group(['middleware' => ['web','role'], 'role'=>['Admin']], function () {
=======

Route::group(['middleware' => ['web','roles'], 'roles'=>['Admin']], function () {
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
  Route::get('/home1', function(){
    echo 'Hello Admin';
  });
});
