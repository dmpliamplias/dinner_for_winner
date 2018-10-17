<?php

// Pages (all accessible from outside)
Route::get('/', 'Page\PageController@index');
Route::get('/home', 'Page\PageController@home')->name('home');
Route::get('/about', 'Page\PageController@about')->name('about');
Route::get('/contact', 'Page\PageController@contact')->name('contact');

// Person
Route::get('/person/overview', 'Person\PersonController@getPersonOverview')->name('personOverview');
Route::post('/person/{id}/edit', 'Person\PersonController@createOrUpdate');

// Calendar
Route::get("/calendar", 'Calendar\CalendarController@index')->name('calendar');

// Dashboard
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// Laravel immutable default routes
Auth::routes();
