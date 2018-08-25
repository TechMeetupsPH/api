<?php

Route::get('/', function () {
    return redirect('app');
});

Route::get('/home', 'HomeController@show');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
