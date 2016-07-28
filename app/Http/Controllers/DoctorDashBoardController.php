<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Appointment;
use App\User;

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
			->with ('appointments', Appointment::all())
			 ->with ('doctors', User::where('isDoctor', '=', '1')->get());
	}
}
