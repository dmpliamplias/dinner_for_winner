<?php

// Pages (all accessible from outside)
Route::get('/', 'Page\PageController@index');
Route::get('/home', 'Page\PageController@home')->name('home');
Route::get('/about', 'Page\PageController@about')->name('about');
Route::get('/contact', 'Page\PageController@contact')->name('contact');
Route::get('/test', 'Page\PageController@test');

// Person
Route::resource('person', 'Person\PersonController');

// Calendar
Route::get('/calendar', 'Calendar\CalendarController@index')->name('calendar.index');
Route::post('/calendar/{id}/store', 'Calendar\CalendarController@store');
Route::post('/calendar/{id}/new', 'Calendar\CalendarController@newRecipe');
Route::post('/calendar/{id}/unconfirm', 'Calendar\CalendarController@unconfirm');

// Dashboard
Route::resource('dashboard', 'Dashboard\DashboardController');

// Recipe
Route::resource('recipe', 'Recipe\RecipeController');

// Recipe
Route::resource('product', 'Product\ProductController');

// Family member
Route::resource('familyMember', 'FamilyMember\FamilyMemberController');

// Buylist
Route::get('/buylist', 'Buylist\BuylistController@index');
Route::get('/buylist/pdf', 'Buylist\BuylistController@createPdf');

// Import
Route::get('/import', 'Import\ImportController1@index');
Route::post('/import/upload', 'Import\ImportController1@upload');

// Laravel immutable default routes
Auth::routes();
