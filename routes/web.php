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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

//For user edit  
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show')->middleware('verified');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/about', 'AboutController@index')->name('about');

//For events
Route::get('/event/create', 'EventController@create')->name('event.create');
Route::post('/event/create', 'EventController@store')->name('event.create');
Route::post('/event', 'EventController@store')->name('event.store');

//For contact
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

//Route::post('/password/reset', 'Auth\PasswordController@reset')->name('password.update');
