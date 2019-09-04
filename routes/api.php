<?php

use Illuminate\Http\Request;

Route::get('/country', 'CountryController@index');
Route::post('/country', 'CountryController@store');
Route::get('/country/{id}', 'CountryController@show');
Route::patch('/country/{id}', 'CountryController@update');
Route::delete('/country/{id}', 'CountryController@destroy');

Route::middleware('auth:api')->group(function () {

    Route::get('/contacts', 'ContactsController@index');
    Route::post('/contacts', 'ContactsController@store');
    Route::get('/contacts/{contact}', 'ContactsController@show');
    Route::patch('/contacts/{contact}', 'ContactsController@update');
    Route::delete('/contacts/{contact}', 'ContactsController@destroy');



    Route::get('birthdays', 'BirthdaysController@index');

    Route::post('search', 'SearchController@index');
});
