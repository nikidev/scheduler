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



Route::get('/calendar', function () {
    return view('calendar');
})->middleware('auth');

Route::get('/', function () {
		if (Auth::check()) 
		{
			if(Auth::user()->isDoctor)
			{
				return redirect('doctor/dashboard');
			}
			else
			{
				return redirect('/home');
			}
			
		} 
		else 
		{
			return view('auth.login');
		}
	});

Route::auth();


Route::get('doctor/dashboard','DoctorDashBoardController@viewRequests');

Route::get('/home', 'AppointmentController@viewAppointmentsList');





Route::get('appointments','AppointmentController@viewAppointmentsList');
Route::get('appointment/create','AppointmentController@viewCreateAppointment');
Route::post('appointment/store','AppointmentController@appointmentStore');
Route::get('appointment/delete/{id}','AppointmentController@appointmentDelete');
Route::get('appointment/edit/{id}','AppointmentController@viewEditAppointment');
Route::put('appointment/update/{id}','AppointmentController@appointmentUpdate');



Route::get('users', 'UserController@viewUsersList');
Route::get('user/delete/{id}','UserController@deleteUser');
Route::get('user/edit/{id}','UserController@viewEditUser');
Route::put('user/update/{id}','UserController@userUpdate');
Route::get('user/create','UserController@viewCreateUser');
Route::post('user/store','UserController@userStore');