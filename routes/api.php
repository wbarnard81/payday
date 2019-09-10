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

    Route::get('/acctype', 'AccountTypeController@index');
    Route::post('/acctype', 'AccountTypeController@store');
    Route::get('/acctype/{id}', 'AccountTypeController@show');
    Route::patch('/acctype/{id}', 'AccountTypeController@store');
    Route::delete('/acctype/{id}', 'AccountTypeController@destroy');

    Route::get('/actcode', 'ActivityCodeController@index');
    Route::post('/actcode', 'ActivityCodeController@store');
    Route::get('/actcode/{id}', 'ActivityCodeController@show');
    Route::patch('/actcode/{id}', 'ActivityCodeController@store');
    Route::delete('/actcode/{id}', 'ActivityCodeController@destroy');

    Route::get('/activity', 'ActivityController@index');
    Route::post('/activity', 'ActivityController@store');
    Route::get('/activity/{id}', 'ActivityController@show');
    Route::patch('/activity/{id}', 'ActivityController@store');
    Route::delete('/activity/{id}', 'ActivityController@destroy');

    Route::get('/bank', 'BanknameController@index');
    Route::post('/bank', 'BanknameController@store');
    Route::get('/bank/{id}', 'BanknameController@show');
    Route::patch('/bank/{id}', 'BanknameController@store');
    Route::delete('/bank/{id}', 'BanknameController@destroy');

    Route::get('/employee', 'EmployeeController@index');
    Route::post('/employee', 'EmployeeController@store');
    Route::get('/employee/{id}', 'EmployeeController@show');
    Route::patch('/employee/{id}', 'EmployeeController@store');
    Route::delete('/employee/{id}', 'EmployeeController@destroy');

    Route::get('/empltype', 'EmployeeTypeController@index');
    Route::post('/empltype', 'EmployeeTypeController@store');
    Route::get('/empltype/{id}', 'EmployeeTypeController@show');
    Route::patch('/empltype/{id}', 'EmployeeTypeController@store');
    Route::delete('/empltype/{id}', 'EmployeeTypeController@destroy');

    Route::get('/employer', 'EmployerController@index');
    Route::post('/employer', 'EmployerController@store');
    Route::get('/employer/{id}', 'EmployerController@show');
    Route::patch('/employer/{id}', 'EmployerController@store');
    Route::delete('/employer/{id}', 'EmployerController@destroy');

    Route::get('/emprtype', 'EmployerTypeController@index');
    Route::post('/emprtype', 'EmployerTypeController@store');
    Route::get('/emprtype/{id}', 'EmployerTypeController@show');
    Route::patch('/emprtype/{id}', 'EmployerTypeController@store');
    Route::delete('/emprtype/{id}', 'EmployerTypeController@destroy');

    Route::get('/frequincy', 'FrequincyController@index');
    Route::post('/frequincy', 'FrequincyController@store');
    Route::get('/frequincy/{id}', 'FrequincyController@show');
    Route::patch('/frequincy/{id}', 'FrequincyController@store');
    Route::delete('/frequincy/{id}', 'FrequincyController@destroy');

    Route::get('/irp5', 'Irp5CodeController@index');
    Route::post('/irp5', 'Irp5CodeController@store');
    Route::get('/irp5/{id}', 'Irp5CodeController@show');
    Route::patch('/irp5/{id}', 'Irp5CodeController@store');
    Route::delete('/irp5/{id}', 'Irp5CodeController@destroy');

    Route::get('/idtype', 'OtherIdTypeController@index');
    Route::post('/idtype', 'OtherIdTypeController@store');
    Route::get('/idtype/{id}', 'OtherIdTypeController@show');
    Route::patch('/idtype/{id}', 'OtherIdTypeController@store');
    Route::delete('/idtype/{id}', 'OtherIdTypeController@destroy');

    Route::get('/paymethod', 'PaymentMethodController@index');
    Route::post('/paymethod', 'PaymentMethodController@store');
    Route::get('/paymethod/{id}', 'PaymentMethodController@show');
    Route::patch('/paymethod/{id}', 'PaymentMethodController@store');
    Route::delete('/paymethod/{id}', 'PaymentMethodController@destroy');

    Route::get('/reppos', 'RepPositionController@index');
    Route::post('/reppos', 'RepPositionController@store');
    Route::get('/reppos/{id}', 'RepPositionController@show');
    Route::patch('/reppos/{id}', 'RepPositionController@store');
    Route::delete('/reppos/{id}', 'RepPositionController@destroy');

    Route::get('/sez', 'SezController@index');
    Route::post('/sez', 'SezController@store');
    Route::get('/sez/{id}', 'SezController@show');
    Route::patch('/sez/{id}', 'SezController@store');
    Route::delete('/sez/{id}', 'SezController@destroy');

    Route::get('/sic7', 'Sic7Controller@index');
    Route::post('/sic7', 'Sic7Controller@store');
    Route::get('/sic7/{id}', 'Sic7Controller@show');
    Route::patch('/sic7/{id}', 'Sic7Controller@store');
    Route::delete('/sic7/{id}', 'Sic7Controller@destroy');

    Route::get('/status', 'StatusController@index');
    Route::post('/status', 'StatusController@store');
    Route::get('/status/{id}', 'StatusController@show');
    Route::patch('/status/{id}', 'StatusController@store');
    Route::delete('/status/{id}', 'StatusController@destroy');

    Route::get('/transaction', 'TransactionController@index');
    Route::post('/transaction', 'TransactionController@store');
    Route::get('/transaction/{id}', 'TransactionController@show');
    Route::patch('/transaction/{id}', 'TransactionController@store');
    Route::delete('/transaction/{id}', 'TransactionController@destroy');

    Route::get('birthdays', 'BirthdaysController@index');

    Route::post('search', 'SearchController@index');
});
