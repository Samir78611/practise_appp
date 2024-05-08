<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LoginController extends Controller
{
    public function LoginForm(Request $request) {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required',
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect(url('dashboard'))->with('success','Here we next step');
        }else{
            return redirect(url('login'))->with('fail','soory login failed');
        
        }
    }
}
