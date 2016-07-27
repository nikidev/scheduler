<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Input;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function viewUsersList()
    {

        $user = User::take(5);
        $selectedRole = [];

        foreach ($user->get() as $key => $value) 
        {
            $selectedRole[] = $value->id;
        }

    	return view('users.index',compact('selectedRole'))
			->with('users', User::all());
    }

    public function deleteUser($id)
    {
    	$currentUser = User::findOrfail($id);
    	$currentUser->appointments()->delete();
    	$currentUser->delete();	
    	return redirect()->back();
    }

    public function viewEditUser($id)
    {
        $user = User::find($id);

        $selectedRole = [];

        foreach ($user->get() as $key => $value) 
        {
            $selectedRole[] = $value->id;
        }

        
        return view('users.edit',compact('selectedRole'))
            ->with('user',$user);
    }

    public function userUpdate($id, Request $request)
    {
        $this->validate($request,[
                'name'     => 'required|min:3|max:255',
                
            ]);
        
        $user = User::where('id',$id)->update([
                'name'=> Input::get('name'),
                'isAdmin'=>Input::get('isAdmin'),
                'isDoctor'=>Input::get('isDoctor'),
            ]);
        
         return redirect('/users');
    }

    public function viewCreateUser()
    {
        return view('users.create');
    }

    public function userStore(Request $request)
    {

        $this->validate($request,[
                'name'     => 'required|min:3|max:255|unique:users',
                'email'    => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);

        $user = User::create([

            'name'=> Input::get('name'),
            'email'=>Input::get('email'),
            'password'=>bcrypt(Input::get('password')),
            'isAdmin'=>Input::get('isAdmin') || Input::get('0'),
            'isDoctor'=>Input::get('isDoctor') || Input::get('0'),

        ]);


         return redirect('/users');
    }
}
