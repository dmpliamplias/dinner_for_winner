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

Route::get('/person/overview', 'PersonController@getPersonOverview')->name('personOverview');

Route::get("/calendar", 'CalendarController@index')->name('calendar');

Route::post('/person/{id}/edit', 'PersonController@createOrUpdate');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Auth::routes();
