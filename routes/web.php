<?php

Route::get('/', 'CardsController@index');

Route::get('/play', 'PlayController@index')->name('play');