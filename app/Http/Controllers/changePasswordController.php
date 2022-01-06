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
            return redirect()->route('login')->with('success', 'Password changed succesfully');
        }else{
            return redirect()->back()->with('error', 'Current password is invalid');
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
           return redirect()->back()->with('success', 'User profile is updated successfully');
        }else {
            return redirect()->back();
        }
    }
}
