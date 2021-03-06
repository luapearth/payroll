<?php

Route::get('/', 'HomeController@index');
Route::get('/login', 'AuthController@index');
Route::get('/lock', 'AuthController@getLock');
Route::get('/logout', 'AuthController@destroy');
Route::post('/upload', 'HomeController@store');

Route::resource('/auth', 'AuthController', 
		array('only' => array('index', 'store', 'destroy')));

Route::resource('/timesheet', 'TimesheetController');

Route::resource('/face', 'DtrController',
		array('only' => array('index', 'store')));

Route::resource('/departments', 'DepartmentsController');

Route::resource('/profile', 'ProfileController',
		array('only', array('index', 'update')));

Route::resource('/employees', 'EmployeesController',
		array('only' => array('index', 'update')));