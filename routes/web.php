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


// Auth::routes();
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nopermission', 'HomeController@nopermission')->name('nopermission');


// BOTH LIBERIAN AND ADMIN
Route::group(['middleware' => ['auth','roles'], 'roles' => ['liberian','admin']], function(){

  Route::resource('books','BooksController');
  Route::resource('authors','AuthorsController');
  Route::resource('countries','CountriesController');
  Route::resource('languages','LanguagesController');
  Route::resource('series','SeriesController');
  Route::resource('publishers','PublishersController');
  Route::resource('genres','GenresController');

  Route::resource('users','UsersController');
  Route::post('users/changepassword','UsersController@changePassword')->name('users.changepassword');

  Route::resource('issuedbooks','IssuedbooksController');
  Route::get('issuedbooksusers-json','IssuedbooksController@issuedbooksUsers')->name('issuedbooksusers');
  Route::post('issuedbookstatus-json','IssuedbooksController@issuedbookStatusUpdate')->name('issuedbookstatus');

});

// ONLY ADMIN
Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin']], function(){

  Route::resource('settings','SettingController')->only(['index','store']);

});


// ONLY ADMIN
Route::group(['middleware' => ['auth','roles'], 'roles' => ['Member','Liberian']], function(){

  Route::resource('requestedbooks','RequestedbookController');

});
