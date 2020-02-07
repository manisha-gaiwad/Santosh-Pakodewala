<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function authorize()
{
    return true;
}

    public function index()
    {
        return view('home');
    }
     public function showChangePasswordForm()
     {
        
        return view('auth.passwords.profile')->with('user', $id);
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
                  

        $validatedData = $request->validate([
            'current-password' => 'required',
            'password' => 'required|confirmed|min:8'
            
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
        
            

    }
    public function updateuser(Request $request, $id){     
        


        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'branch_name' => 'required',
            'email' => 'required',
            'role' => 'required'

        ]);

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->branch_name = $request->get('branch_name');
        $user->email = $request->get('email');
         $user->role = $request->get('role');
        $user->update();

        return redirect()->back()->with("success","Profile Updated successfully !");
        
            

    }
}
