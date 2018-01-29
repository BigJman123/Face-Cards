<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CardsController@index')->name('start');

Route::middleware(['auth'])->group(function() {

    Route::get('/play', 'PlayController@index')->name('play');
    
    Route::post('/play', 'PlayController@store')->name('play.store');
    
    Route::get('/results', 'ResultsController@show');
    
    Route::post('card/{card}/attempt', 'AttemptController@store')->name('attempt.store');

});

Route::get('logout', function() {
    auth()->logout();
    \Session::flush();
    return redirect('/');
});
