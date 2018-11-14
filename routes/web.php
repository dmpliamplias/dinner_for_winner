<?php

// Pages (all accessible from outside)
Route::get('/', 'Page\PageController@index');
Route::get('/home', 'Page\PageController@home')->name('home');
Route::get('/about', 'Page\PageController@about')->name('about');
Route::get('/contact', 'Page\PageController@contact')->name('contact');

// Person
Route::get('/person/overview', 'Person\PersonController@getPersonOverview')->name('person.overview');
Route::get('/person/{id}/edit', 'Person\PersonController@getPersonEditView')->name('person.edit');
Route::get('/person/{id}/add', 'Person\PersonController@getAddPersonView')->name('person.add');
Route::post('/person/update', 'Person\PersonController@update')->name('person.update');
Route::get('/person/create', 'Person\PersonController@create')->name('person.create');
Route::post('/person/add', array('uses' => 'Person\PersonController@add'))->name('person.add');

// Calendar
Route::get("/calendar", 'Calendar\CalendarController@index')->name('calendar');

// Dashboard
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// Recipe
Route::resource('recipe', 'Recipe\RecipeController');

// Laravel immutable default routes
Auth::routes();



//Route::resource('person', 'Person\PersonController');
// todo make reoute over resoure and controller https://www.youtube.com/watch?v=emyIlJPxZr4 part 6