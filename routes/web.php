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
Route::get('/books/search', 'HomeController@search')->name('frontend.search');

Route::get('/blog', 'HomeController@blog')->name('frontend.blog');

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
  Route::resource('posts','PostController');
  Route::resource('categories','CategoryController')->except('create');

  Route::get('profile','ProfileController@profile')->name('profile');
  Route::post('profile','ProfileController@profileUpdate')->name('profile.update');
  Route::post('changepassword','ProfileController@changePassword')->name('profile.changepassword');

});
