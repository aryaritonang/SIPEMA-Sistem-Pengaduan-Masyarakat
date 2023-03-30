<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|string',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $login = ['username' => $request->username, 'password' => $request->password];
        if(Auth::attempt($login)):
            if (Auth::guard(Auth::user()->account_type)->attempt($login)) {
                $request->session()->put('guard_key', Auth::user()->account_type);
            }
        endif;
        
        if(!empty(session('guard_key'))) {
            return redirect('login/successlogin');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function successlogin()
    {
        return redirect()->route('main.index');
    }

}
