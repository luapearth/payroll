<?php

Route::get('/', 'HomeController@index');
Route::get('/login', 'AuthController@index');

Route::resource('/auth', 'AuthController', 
		array('only' => array('index', 'store', 'destroy')));

Route::resource('/timesheet', 'TimesheetController',
		array('only' => array('index', 'store')));

Route::resource('/departments', 'DepartmentsController');
