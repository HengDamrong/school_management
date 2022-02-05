<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function Home()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('admindashbord.index', compact('user'));
    }
}
