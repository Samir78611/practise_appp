<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class dashboardController extends Controller
{
    public function dashboardUser() {
        if(Auth::check()) {
            $user=Auth::user();
            $name=$user->name;
            $retrive=DB::select("CALL retrive_function()");
            return view('dashboard',compact('name','retrive'));
        }
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

    public function delete($id){
        if(Auth::check()){
            $user_interface=DB::delete("CALL delete_user(?)",array($id));
            return redirect(url('dashboard'))->with('success','deleted successfully');
        }else{
            return redirect(url('dashboard'))->with('fail','deleted not successfully');
        }
    }

    public function editUser($id){
        $data=DB::select("CALL edit_data_of_student(?)", array($id));
        return view('edit_student',compact('data'));
    }
}
