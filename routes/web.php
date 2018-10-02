<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/book/{slug}', 'HomeController@show')->name('frontend.book.show');
Route::get('/books/authors', 'HomeController@authors')->name('frontend.authors');
Route::get('/books/author/{slug}', 'HomeController@authorsShow')->name('frontend.author.show');

Route::get('/books/archive/{slug}', 'HomeController@archive')->name('frontend.archive');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');


// DASHBOARD
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/nopermission', 'DashboardController@nopermission')->name('nopermission');

// ONLY ADMIN
Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin']], function(){

  Route::resource('settings','SettingController')->only(['index','store']);

});

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

// MEMBER AND LIBERIAN AND ADMIN
Route::group(['middleware' => ['auth','roles'], 'roles' => ['Member','Liberian','Admin']], function(){

  Route::resource('requestedbooks','RequestedbookController');

  Route::get('settings/profile','SettingController@profile')->name('profile');
  Route::post('settings/profile','SettingController@profileUpdate')->name('profile.update');
  Route::post('settings/changepassword','SettingController@changePassword')->name('profile.changepassword');

});
