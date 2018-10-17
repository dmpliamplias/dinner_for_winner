<?php

// Pages (all accessible from outside)
Route::get('/', 'Page\PageController@home');
Route::get('/home', 'Page\PageController@home');
Route::get('/about', 'Page\PageController@about');
Route::get('/contact', 'Page\PageController@contact');

// Person
Route::get('/person/overview', 'Person\PersonController@getPersonOverview')->name('personOverview');
Route::post('/person/{id}/edit', 'Person\PersonController@createOrUpdate');

// Calendar
Route::get("/calendar", 'Calendar\CalendarController@index')->name('calendar');

// Dashboard
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// Laravel immutable default routes
Auth::routes();
