<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Appointment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DoctorDashBoardController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}


	public function viewRequests()
	{
		$user = User::all();

		return view('doctorDashboard')
			->with ('appointments', Appointment::where('doctor_id','=', Auth::user()->id)->get())
			 ->with ('doctors', User::where('isDoctor', '=', '1')->get());
	}


	public function doctorAppointmentUpdate($id,Request $request)
    {
    	
        
        $appointment = Appointment::where('id',$id)->update([
                 
                 
                 'status' => Input::get('status'),
            ]);


    	return redirect('/doctor/dashboard');
    }
}
