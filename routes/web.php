<?php

Route::resource('/book', 'BookController')->middleware('auth');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
