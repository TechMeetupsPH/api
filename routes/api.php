<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/organization', 'OrganizationController@create');
Route::get('/meetup', 'MeetupController@list');
Route::post('/meetup', 'MeetupController@create');
Route::post('/attendee', 'AttendeeController@create');
