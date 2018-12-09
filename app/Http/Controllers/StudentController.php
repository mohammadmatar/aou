<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\Application;
use App\Student;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{

    public function register(){
        $pg=40;
        return view('register',compact(['pg']));
    }

     public function my_profile($id){
        $pg=38;
        $profile=Student::find($id);
        return view('student.profile',compact(['profile','pg']));
    }

        public function edit_profile(){
        $pg=38;
        $std=Student::find(auth()->guard('student')->user()->id);
        return view('student.edit_profile',compact(['pg','std']));
    }

    public function print($id){
        $app=Application::find($id);
        
        return view('student.print',compact(['app','pg']));

        
    }

    public function cancel($id){
        $pg=47;
        $app=Application::find($id);
        return view('student.cancel',compact(['app','pg']));

        
    }


    public function cancelation(Request $request){
        //dd($request);
        $req=Application::find($request->app_id);
        $req->notes=$request->notes;
        $req->status=3;
        $req->save();
        return redirect('student/enrolls');

        
    }


public function update_profile(Request $request){
        $std= Student::find($request->sid);
        $std->name=$request->name;
        $std->Address=$request->address;
        $std->level=$request->level;
        $std->branch_id=$request->branch_id;
        $std->password=Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $std->img=$filename;
        $std->update();
        return back()->with('success',' Profile updated successfully');
   
    }

   /* public function update_profile(Request $request){
        $inst= Instructor::find($request->iid);
        $inst->name=$request->name;
        $inst->Address=$request->address;
        $inst->summary=$request->summary;
        $inst->password=Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $inst->img=$filename;
        $inst->update();
        return back()->with('success',' Profile updated successfully');
   
    }*/


    public function login(){
        $pg=0;
    	return view('student.login',compact(['pg']));
    }

    public function check_login(Request $request)
    {   
        $remmberme = $request->remmberme==1?true:false;
        if(auth()->guard('student')->attempt(['student_id'=>$request->student_id,'password'=>$request->password],$remmberme)){
            return redirect('/');
        }else{
            session()->flash('error','Please enter valid ID and password');
            return back()->with(['message'=>'please enter valid ID and password']);
        }
    }

    public function logout()
    {
        auth()->guard('student')->logout();
        return redirect('/student/login');

    } 

    /*public function Apply($id)
    {   
        if(!auth()->guard('student')->user()){
            return redirect('/student/login');
        }
        $student_id=auth()->guard('student')->user()->id;
        $application=Application::where('student_id','=',$student_id)->where('course_id','=',$id)->get();
        if($application->isNotEmpty()){
           return back()->with('error',' You applied to this course before');
        }else{
            $app=new Application();
            $app->course_id=$id;
            $app->student_id=$student_id;
            $app->save();
             return back()->with('success',' You applied to this Course successfully');

        }

    }*/

    public function Apply($id)
    {   
        $pg=80;
        if(!auth()->guard('student')->user()){
            return redirect('/student/login');
        }else{
            return view('student.apply',compact(['pg','id']));
        }

    }

    public function apply_course(Request $request)
    {   
        //dd($request);
        $student_id=auth()->guard('student')->user()->id;
        $application=Application::where('student_id','=',$student_id)->where('course_id','=',$request->course_id)->get();
        if($application->isNotEmpty()){
           return redirect('/')->with('error',' You applied to this course before');
        }else{
            $app=new Application();
            $test=Application::where('inv_no',$request->inv_no)->get();
            if($test->isNotEmpty()){
                return back()->with('error',' this invo is used before....');
            }else{
            $app->course_id=$request->course_id;
            $app->student_id=$student_id;
            $app->inv_no=$request->inv_no;
            $app->acc_no=$request->acc_no;
            $app->bank_name=$request->bank_name;
            $file = $request->file('inv_img');
            $filename = time() . '.' . $file->getClientOriginalName();
            $path = 'img';
            $file->move($path, $filename);
            $app->inv_img=$filename;
            $app->save();
             return back()->with('success',' You applied to this Course successfully');
            }
        }

    }

    public function enrolls(){
        $pg=11;
        $applications=Application::where('student_id','=',auth()->guard('student')->user()->id)->get();
        //dd($applications);
        return view('student.enrolls',compact(['pg','applications']));
    }

}
