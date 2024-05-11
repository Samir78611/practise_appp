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

    public function Updatedetails(Request $request) {
        $this->validate($request, [
            'name'=>'required',
        ]);
        $id=$request->input('id');
        $name=$request->input('name');
        $city=$request->input('city');
        $photo=$request->file('photo');
        if($photo!=""){
            $photo_new_name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('student'),$photo_new_name);
        }else{
            $data=DB::select("CALL edit_data_of_student(?)", array($id));
            $photo_new_name=$data[0]->photo;
        }
        
        $address=$request->input('address');
        $school=$request->input('school');
        $updated_at= date("Y-m-d H:i:s");
        $update_details=DB::update("CALL update_details	(?,?,?,?,?,?,?)",array($id,$name,$city,$photo_new_name,$address,$school,$updated_at));
        if($update_details){
            return redirect(url('dashboard'))->with('success', 'You have succesfully Updated our data');
        }else{
            return redirect(url('dashboard'))->with('fail', 'You have not succesfully Updated our data');
        }
    
        
    }
    public function logout(){
        if(Auth::check()){
            $user=Auth::logout();
            return redirect(url('login'))->with('success','Logout Successfully');
        }else{
            return redirect(url('dashboard'))->with('fail','Logout Successfully');
        }
    }
}
