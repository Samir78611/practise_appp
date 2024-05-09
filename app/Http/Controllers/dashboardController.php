<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class dashboardController extends Controller
{
    public function dashboardUser() {
        return view('dashboard');
    }

    public function attendence(Request $request) {
        $this->validate($request, [
            'photo'=>'required',
            'address'=>'required'
        ]);
        $name=$request->input('name');
        $city=$request->input('city');
        $photo=$request->file('photo');
        $photo_new_name=time().'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('student'),$photo_new_name);
        $address=$request->input('address');

        $school=$request->input('school');
        $created_at= date("Y-m-d H:i:s");
        $updated_at= date("Y-m-d H:i:s");
        $insert_student=DB::insert("CALL student_registration(?,?,?,?,?,?,?)",array($name,$city,$photo_new_name,$address,$school,$created_at,$updated_at));
        if($insert_student){
            return redirect(url('dashboard'))->with('success','registration successfully added');
        }else{
            return redirect(url('dashboard'))->with('fail','registration not successfully added');
        }

    }
}
