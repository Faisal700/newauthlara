
<?php

use Illuminate\Support\Facades\Route;

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
// crud using ajax
Route::resource('ajax-crud', 'AjaxCrudController')->middleware('auth');
Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update')->middleware('auth');
Route::get('ajax-crud/edit/{id}', 'AjaxCrudController@edit')->middleware('auth');
Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy')->middleware('auth');
// Route::get('/employee','EmpolyeeController@index')->name('addnow');
// Route::post('/employee','EmpolyeeController@store');
Route::resource('employee','EmpolyeeController');
// one to many
Route::resource('customers','CustomersController');
// one to one customes
Route::resource('members','MembersController');

// Social logins in movies project
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
// movies project
Route::resource('movies','MoviesController')->middleware('auth');
// adding profile in movies project
Route::get('profile','UserController@profile')->name('profile')->middleware('auth');
Route::post('profile','UserController@update_avatar');
// authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
