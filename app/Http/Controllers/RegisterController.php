<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function checkregister(Request $request)
    {
        $validate = $this->validate($request, [
            'name'   => 'required|string',
            'username'   => 'required|string',
            'password'  => 'required|alphaNum|min:3',
        ]);
        
        if($validate) {
            $data['username'] = $request->username;
            $data['password'] = Hash::make($request->password);
            $data['account_type'] = 'user';
            
            $account = Account::create($data);
            unset($data['account_type']);
            
            $data['name'] = $request->name;
            $data['id_account'] = $account->id;
            User::create($data);
            return redirect('register/successregister');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function successregister()
    {
        return redirect()->route('login.index');
    }

}
