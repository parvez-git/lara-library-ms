<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});


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

});
