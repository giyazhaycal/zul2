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



Auth::routes();

Route::get('/', 'DashboardController@showDashboard');
Route::get('dashboard', 'DashboardController@showDashboard');


Route::get('list-users', 'UsersController@showUsers');
Route::get('list-users/datatable', 'UsersController@datatable');