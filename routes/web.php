<?php

// Pages (all accessible from outside)
Route::get('/', 'Page\PageController@index');
Route::get('/home', 'Page\PageController@home')->name('home');
Route::get('/about', 'Page\PageController@about')->name('about');
Route::get('/contact', 'Page\PageController@contact')->name('contact');

// Person
Route::resource('person', 'Person\PersonController');

// Calendar
Route::resource('calendar', 'Calendar\CalendarController');

// Dashboard
Route::resource('dashboard', 'Dashboard\DashboardController');

// Recipe
Route::resource('recipe', 'Recipe\RecipeController');

// Family member
Route::resource('familyMember', 'FamilyMember\FamilyMemberController');

// Import
Route::get('/import', 'Import\ImportController1@index');
Route::post('/import/upload', 'Import\ImportController1@upload');

// Laravel immutable default routes
Auth::routes();



//Route::resource('person', 'Person\PersonController');
// todo make reoute over resoure and controller https://www.youtube.com/watch?v=emyIlJPxZr4 part 6
