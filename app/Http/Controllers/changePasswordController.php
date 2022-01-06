<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    public function changePassword()
    {
        return view('admin.body.change_password');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$hashPassword ))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password changed successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current password is invalid',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


//    Update Profile
    public function showProfile()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user)
        {
           $user->name = $request['name'];
           $user->email = $request['email'];

           $user->save();
            $notification = array(
                'message' => 'User profile is updated successfully',
                'alert-type' => 'success'
            );
           return redirect()->back()->with($notification);
        }else {
            return redirect()->back();
        }
    }
}
