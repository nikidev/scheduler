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
        
    	
    	return view('home')
    		->with ('appointments', Appointment::all())
            ->with ('doctors', User::where('isDoctor', '=', '1')->get());
    }

    public function viewCreateAppointment()
    {
        if(Auth::user()->isDoctor && !Auth::user()->isAdmin)
        {
            return view('home');
        }
        else
        {
            return view('appointments.create')
                ->with ('users', User::where('isDoctor', '=', '1')->get());
        }        
    }


    public function appointmentStore(Request $request)
    {
    	$this->validate($request,[
                
                'hour'  => 'required',
                'doctor_id' => 'numeric',
                
            ]);

            $appointment = Auth::user()->appointments()->create([

                    'user_id'=> Auth::user()->id,
                    'doctor_id'=>Input::get('doctor'),
                    'hour' => Input::get('hour'),
                    'status' => Input::get('status','Pending'),
                    
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
        ->with ('users', User::where('isDoctor', '=', '1')->get());
    }


    public function appointmentUpdate($id,Request $request)
    {
    	$this->validate($request,[
                
                'hour'  => 'required',
                'doctor_id' => 'numeric',
                
            ]);
        
        $appointment = Appointment::where('id',$id)->update([
                 
                 'doctor_id'=>Input::get('doctor'),
                 'hour' => Input::get('hour'),
                 'status' => Input::get('status','Pending'),
            ]);


    	return redirect('/appointments');
    }
}
