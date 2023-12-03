<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('backend.user.view_profile', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $userData = User::findOrFail($id);
        return view('backend.user.edit_profile', compact('userData'));
    }

    public function ProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::findOrFail($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->address = $request->address;
        $userData->mobile = $request->mobile;
        $userData->gender = $request->gender;
        

        $file = $request->file('image');
        if ($file) {
            @unlink(public_path('upload/user_images/'.$userData->image));
            $filename = date('YmdHi').'.'.$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $userData->image = $filename;

        }
        $userData->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordChange($value='')
    {
        return view('backend.user.password_view');
    }

    public function PasswordUpdate(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required',
            // 'new_password' => 'required|confirmed',
            'newpassword' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ],[

            'password_confirmation.confirmed' => 'Password fields do not match',

        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save();

            Auth::logout();
            return redirect()->route('login');
        }else {
            $notification = array(
                'message' => 'Failed to update password' ,
                'alert-type' => 'error', 
            );
            return redirect()->back()->with($notification);
        }


    }



} // End CLass
