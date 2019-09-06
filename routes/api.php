<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->group(function () {

    Route::get('/contacts', 'AccountRelationshipController@index');
    Route::post('/contacts', 'AccountRelationshipController@store');
    Route::get('/contacts/{contact}', 'AccountRelationshipController@show');
    Route::patch('/contacts/{contact}', 'AccountRelationshipController@store');
    Route::delete('/contacts/{contact}', 'AccountRelationshipController@destroy');

    Route::get('/country', 'CountryController@index');
    Route::post('/country', 'CountryController@store');
    Route::get('/country/{id}', 'CountryController@show');
    Route::patch('/country/{id}', 'CountryController@store');
    Route::delete('/country/{id}', 'CountryController@destroy');

    Route::get('/country', 'AccountTypeController@index');
    Route::post('/country', 'AccountTypeController@store');
    Route::get('/country/{id}', 'AccountTypeController@show');
    Route::patch('/country/{id}', 'AccountTypeController@store');
    Route::delete('/country/{id}', 'AccountTypeController@destroy');

    Route::get('/country', 'ActivityCodeController@index');
    Route::post('/country', 'ActivityCodeController@store');
    Route::get('/country/{id}', 'ActivityCodeController@show');
    Route::patch('/country/{id}', 'ActivityCodeController@store');
    Route::delete('/country/{id}', 'ActivityCodeController@destroy');

    Route::get('/country', 'ActivityController@index');
    Route::post('/country', 'ActivityController@store');
    Route::get('/country/{id}', 'ActivityController@show');
    Route::patch('/country/{id}', 'ActivityController@store');
    Route::delete('/country/{id}', 'ActivityController@destroy');

    Route::get('/country', 'AppController@index');
    Route::post('/country', 'AppController@store');
    Route::get('/country/{id}', 'AppController@show');
    Route::patch('/country/{id}', 'AppController@store');
    Route::delete('/country/{id}', 'AppController@destroy');

    Route::get('/country', 'BanknameController@index');
    Route::post('/country', 'BanknameController@store');
    Route::get('/country/{id}', 'BanknameController@show');
    Route::patch('/country/{id}', 'BanknameController@store');
    Route::delete('/country/{id}', 'BanknameController@destroy');

    Route::get('/country', 'EmployeeController@index');
    Route::post('/country', 'EmployeeController@store');
    Route::get('/country/{id}', 'EmployeeController@show');
    Route::patch('/country/{id}', 'EmployeeController@store');
    Route::delete('/country/{id}', 'EmployeeController@destroy');

    Route::get('/country', 'EmployeeTypeController@index');
    Route::post('/country', 'EmployeeTypeController@store');
    Route::get('/country/{id}', 'EmployeeTypeController@show');
    Route::patch('/country/{id}', 'EmployeeTypeController@store');
    Route::delete('/country/{id}', 'EmployeeTypeController@destroy');

    Route::get('/country', 'EmployerController@index');
    Route::post('/country', 'EmployerController@store');
    Route::get('/country/{id}', 'EmployerController@show');
    Route::patch('/country/{id}', 'EmployerController@store');
    Route::delete('/country/{id}', 'EmployerController@destroy');

    Route::get('/country', 'EmployerTypeController@index');
    Route::post('/country', 'EmployerTypeController@store');
    Route::get('/country/{id}', 'EmployerTypeController@show');
    Route::patch('/country/{id}', 'EmployerTypeController@store');
    Route::delete('/country/{id}', 'EmployerTypeController@destroy');

    Route::get('/country', 'FrequincyController@index');
    Route::post('/country', 'FrequincyController@store');
    Route::get('/country/{id}', 'FrequincyController@show');
    Route::patch('/country/{id}', 'FrequincyController@store');
    Route::delete('/country/{id}', 'FrequincyController@destroy');

    Route::get('/country', 'Irp5CodeController@index');
    Route::post('/country', 'Irp5CodeController@store');
    Route::get('/country/{id}', 'Irp5CodeController@show');
    Route::patch('/country/{id}', 'Irp5CodeController@store');
    Route::delete('/country/{id}', 'Irp5CodeController@destroy');

    Route::get('/country', 'OtherIdtypeController@index');
    Route::post('/country', 'OtherIdtypeController@store');
    Route::get('/country/{id}', 'OtherIdtypeController@show');
    Route::patch('/country/{id}', 'OtherIdtypeController@store');
    Route::delete('/country/{id}', 'OtherIdtypeController@destroy');

    Route::get('/country', 'PaymentMethodController@index');
    Route::post('/country', 'PaymentMethodController@store');
    Route::get('/country/{id}', 'PaymentMethodController@show');
    Route::patch('/country/{id}', 'PaymentMethodController@store');
    Route::delete('/country/{id}', 'PaymentMethodController@destroy');

    Route::get('/country', 'RepPositionController@index');
    Route::post('/country', 'RepPositionController@store');
    Route::get('/country/{id}', 'RepPositionController@show');
    Route::patch('/country/{id}', 'RepPositionController@store');
    Route::delete('/country/{id}', 'RepPositionController@destroy');

    Route::get('/country', 'SezController@index');
    Route::post('/country', 'SezController@store');
    Route::get('/country/{id}', 'SezController@show');
    Route::patch('/country/{id}', 'SezController@store');
    Route::delete('/country/{id}', 'SezController@destroy');

    Route::get('/country', 'Sic7Controller@index');
    Route::post('/country', 'Sic7Controller@store');
    Route::get('/country/{id}', 'Sic7Controller@show');
    Route::patch('/country/{id}', 'Sic7Controller@store');
    Route::delete('/country/{id}', 'Sic7Controller@destroy');

    Route::get('/country', 'StatusController@index');
    Route::post('/country', 'StatusController@store');
    Route::get('/country/{id}', 'StatusController@show');
    Route::patch('/country/{id}', 'StatusController@store');
    Route::delete('/country/{id}', 'StatusController@destroy');

    Route::get('/country', 'TransactionController@index');
    Route::post('/country', 'TransactionController@store');
    Route::get('/country/{id}', 'TransactionController@show');
    Route::patch('/country/{id}', 'TransactionController@store');
    Route::delete('/country/{id}', 'TransactionController@destroy');

    Route::get('birthdays', 'BirthdaysController@index');

    Route::post('search', 'SearchController@index');
});
