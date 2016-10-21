<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
Route::get('/users', 'UsersController@index');
/**
Route::get('/laws', 'LawsController@index');
Route::get('/laws/new', 'LawsController@create');
 * 
 */
Route::resource('laws', 'LawsController');
Route::resource('categories', 'CategoriesController');
Route::resource('societies', 'SocietyController');
Route::resource('priorities', 'PriorityController');
Route::resource('status', 'StatusController');
Route::resource('users', 'UsersController');
Route::resource('tickets', 'TicketController');
Route::get('/tickets/status/{status}', ['uses' => 'TicketController@showTicketsByStatus', 'as' => 'tickets.status'])->where('status', '[0-9]+');
