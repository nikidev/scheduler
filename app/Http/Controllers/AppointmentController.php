<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Appointment;

use App\User;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function viewAppointmentsList()
    {
    	$appointments = Appointment::all();

    	return view('home')
    		->with ('appointments',$appointments);
    }

    public function viewCreateAppointment()
    {
    	return view('appointments.create')
            ->with ('users', User::where('isDoctor', '=', '1')->get());
    }


    public function appointmentStore(Request $request)
    {
    	// $this->validate($request,[
                
     //            'hour'  => 'required',
     //            'status'  => 'required',
     //            'doctor_id' => 'numeric',
                
     //        ]);

            $appointment = Auth::user()->appointments()->create([

                    'user_id'=> Auth::user()->id,
                    'doctor_id'=>Input::get('doctor'),
                    'hour' => Input::get('hour'),
                    'status' => Input::get('status'),
                    
                ]);
        

        return redirect('/appointments');
    }



    public function appointmentDelete($id)
    {
    	$appointment = Appointment::findOrfail($id);
        $appointment->delete();
        return redirect()->back();
    }


    public function viewEditAppointment($id)
    {
    	$appointment = Appointment::find($id);

        return view('appointments.edit')
        ->with('appointment',$appointment)
        ->with('users', User::all());
    }


    public function appointmentUpdate($id,Request $request)
    {
    	$this->validate($request,[
                
                'hour'  => 'required',
                'status'  => 'required',
                'doctor_id' => 'numeric',
                
            ]);
        
        $article = Article::where('id',$id)->update([
                 
                 'doctor_id'=>Input::get('doctor'),
                 'hour' => Input::get('hour'),
                 'status' => Input::get('status'),
            ]);


    	return redirect('/articles');
    }
}
