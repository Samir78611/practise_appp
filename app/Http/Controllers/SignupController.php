<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SignupController extends Controller
{
    public function Signup(Request $request) {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);
        $name=$request->input('name');
        $last_name=$request->input('lname');
        $email=$request->input('email');
        $password=$request->input('password');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $insert_user=DB::insert("CALL Signup(?,?,?,?,?,?)",array($name,$last_name,$email,$password,$created_at,$updated_at));
        if($insert_user) {
            return redirect(url('login'))->with('success','Here we next step');
        }else{
            return redirect(url('signup'))->with('fail','Here we next step');
        }
    }
}
