<?php

Route::get('/', 'HomeController@index');
Route::get('/login', 'AuthController@index');
Route::get('/lock', 'AuthController@getLock');
Route::get('/logout', 'AuthController@destroy');

Route::resource('/auth', 'AuthController', 
		array('only' => array('index', 'store', 'destroy')));

Route::resource('/timesheet', 'TimesheetController',
		array('only' => array('index', 'store')));

Route::resource('/departments', 'DepartmentsController');
