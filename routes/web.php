<?php

Route::get('/', 'CardsController@index');

Route::get('/play', 'CardsController@show');