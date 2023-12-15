<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //
    public function loginAdmin()
    {
        return view('admin.login.index');
    }
    public function loginAdminPost(Request $req)
    {
        if(Auth::attempt(['username' => $req->username, 'password' => $req->password, 'role_id'=>1]))
        {
            return redirect()->route('home_admin');
        }
        return redirect()->route('login.admin')->with('error', 'Failed Login');
    }
    public function logoutAdmin(){

        Auth::logout();
        return redirect()->route('login.admin');
    }
}