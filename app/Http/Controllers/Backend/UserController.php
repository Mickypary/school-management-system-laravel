<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        $user = new User();

        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $notification = array(
            'message' => 'User Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id)
    {
        $data['userData'] = User::findOrFail($id);
        return view('backend.user.edit_user', $data);
    }

    public function UserUpdate(Request $request, $id)
    {
        // User::findOrFail($id)->update([
        //     'usertype' => $request->usertype,
        //     'name' => $request->name,
        //     'email' => $request->email,           
        // ]);

        $user = User::findOrFail($id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('user.view')->with($notification);
    }



} // End Class
