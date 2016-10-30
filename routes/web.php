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
Route::resource('permissions', 'PermissionController');
Route::resource('tickets', 'TicketController');
Route::resource('gestionpermission', 'GestionPermissionController', ['except' => ['update']]);
Route::resource('roles', 'RoleController');
Route::get('/roles/{id}/permission', ['uses' => 'RoleController@editPermission', 'as' => 'role.editpermission'])->where('id','[0-9]+');
Route::put('/roles/{id}/permission', ['uses' => 'RoleController@updatePermission', 'as' => 'role.updatepermission'])->where('id','[0-9]+');
Route::put('/gestionpermission', ['uses' => 'GestionPermissionController@update', 'as' => 'gestionpermission.update']);
Route::get('/tickets/status/{status}', ['uses' => 'TicketController@showTicketsByStatus', 'as' => 'tickets.status'])->where('status', '[0-9]+');

Route::get('/tickets/status/{status}/user/{id}', ['uses' => 'TicketController@showYourTicketsByStatus', 'as' => 'tickets.createby'])->where('status', '[0-9]+')->where('id', '[0-9]+');
Route::get('/tickets/user/{id}/all', ['uses' => 'TicketController@showAllYourTicket', 'as' => 'tickets.allyour'])->where('id', '[0-9]+');
