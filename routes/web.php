<?php

Auth::routes();

Route::get('/', 'CardsController@index')->name('start');

Route::get('/play', 'PlayController@index')->name('play');

Route::post('/play', 'PlayController@store')->name('play.store');

Route::get('/results', 'ResultsController@show');

Route::get('/home', 'HomeController@index')->name('home');
