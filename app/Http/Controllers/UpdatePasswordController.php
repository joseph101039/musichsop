<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class UpdatePasswordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        if(strcmp($request->get('new_password'), $request->get('new_password_confirmation')) != 0){
            
            //Current password and new password are same
            return redirect()->back()->with("error","New Password is not same as your Confirm New Password. Please type again.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
   
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }   
}
