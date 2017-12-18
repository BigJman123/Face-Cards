<?php

Route::get('/', 'CardsController@index')->name('home');

Route::get('/play', 'PlayController@index')->name('play');

Route::post('/play', 'PlayController@store')->name('play.store');

Route::get('/results', 'ResultsController@show');