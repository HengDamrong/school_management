<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ViewProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('admindashbord.Users.view_profile', compact('user'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admindashbord.Users.edit_profile', compact('user'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $data['image'] = $filename;
        } //end if
        $data->update();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }
    public function PasswordView()
    {
        return view('admindashbord.Users.edit_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return \redirect()->route('login');
        } else {
            $notification = array(
                'message' => 'Password Confirmed Fail',
                'alert-type' => 'warning'
            );
            return \redirect()->back()->with($notification);
        }
    }
}
