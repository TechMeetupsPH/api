<?php

Route::get('/', function () {
    return redirect('app');
});

ROute::get('/home', 'HomeController@show');
