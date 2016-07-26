<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
		if (Auth::check()) {
			return redirect('/home');
		} else {
			return view('auth.login');
		}
	});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('appointments','AppointmentController@viewAppointmentsList');
Route::get('appointment/create','AppointmentController@viewCreateAppointment');
Route::post('appointment/store','AppointmentController@appointmentStore');
Route::get('appointment/delete/{id}','AppointmentController@appointmentDelete');
Route::get('appointment/edit/{id}','AppointmentController@viewEditAppointment');
Route::put('appointment/update/{id}','AppointmentController@appointmentUpdate');