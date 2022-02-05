<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView()
    {
        $users = User::all();
        //echo "Hello";
        return view('admindashbord.Users.user', compact('users'));
    }

    public function UserAdd()
    {
        return view('admindashbord.Users.adduser');
    }

    public function StoreUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id)
    {
        $users = User::find($id);
        return view('admindashbord.Users.edituser', compact('users'));
    }

    public function UserUdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->update();
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.view')->with($notification);
    }
}
