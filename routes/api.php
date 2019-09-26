<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->group(function () {

    Route::resource('accrel', 'AccountRelationshipController');
    Route::resource('country', 'CountryController');
    Route::resource('acctype', 'AccountTypeController');
    Route::resource('actcode', 'ActivityCodeController');
    Route::resource('activity', 'ActivityController');
    Route::resource('bank', 'BanknameController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('empltype', 'EmployeeTypeController');
    Route::resource('employer', 'EmployerController');
    Route::resource('emprtype', 'EmployerTypeController');
    Route::resource('frequincy', 'FrequincyController');
    Route::resource('irp5', 'Irp5CodeController');
    Route::resource('idtype', 'OtherIdtypeController');
    Route::resource('paymethod', 'PaymentMethodController');
    Route::resource('reppos', 'RepPositionController');
    Route::resource('sez', 'SezController');
    Route::resource('sic7', 'Sic7Controller');
    Route::resource('status', 'StatusController');
    Route::resource('transaction', 'TransactionController');

    Route::get('birthdays', 'BirthdaysController@index');

    Route::post('search', 'SearchController@index');

    Route::get('/news', 'SearchController@news');
});
