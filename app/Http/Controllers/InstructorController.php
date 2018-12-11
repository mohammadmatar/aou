<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Instructor;
use App\Application;
use App\Request as Irequest;
use App\Http\Requests\CourseReqeust;
class InstructorController extends Controller
{

    public function register()
    {
        $pg = 40;
        return view('instructor.register', compact(['pg']));
    }

    public function print($id){
        $app=Application::find($id);
        
        return view('instructor.print',compact(['app','pg']));
    }

    public function my_profile($id){
        $pg=38;
        $profile=Instructor::find($id);
        return view('instructor.myprofile',compact(['profile','pg']));
    }

    public function edit_profile(){
        $pg=38;
        return view('instructor.edit_profile',compact(['pg']));
    }



    public function update_profile(Request $request){
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
   
    }


    public function instructor_profile($id){
        $pg=50;
        $instructor=Instructor::find($id);
        $courses=Course::all()->where('instuctor_id','=',$id);
    	return view('instructor.profile',compact(['pg','instructor','courses']));
    }

    public function edit_course($id){
        $pg=0;
        $course=Course::find($id);
        return view('instructor.edit_course',compact(['pg','course']));
    }

    

    public function delete_course($id){
        $crs=Course::find($id)->delete();
        return redirect('/courses/index')->with(['success'=>'successfully deleted...']);
    }


     public function update_course(Request $request){

        $course= Course::find($request->cid);
        $course->name=$request->name;
        $course->summary=$request->summary;
        $course->level=$request->level;
        $course->field_id=$request->field_id;
        $course->branch_id=$request->branch_id;
        $course->price=$request->fees;
        $course->hours=$request->hours;
        $course->discount=$request->discount;
        $course->seats=$request->seats;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $course->img=$filename;
        $course->update();

        return back()->with('success',' Course updated successfully.');


        
    }

    public function save_course(CourseReqeust $request){

        $course=new Course();
        $course->name=$request->name;
        $course->summary=$request->summary;
        $course->level=$request->level;
        $course->field_id=$request->field_id;
        $course->instuctor_id=auth()->guard('instructor')->user()->id;
        $course->branch_id=$request->branch_id;
        $course->price=$request->fees;
        $course->hours=$request->hours;
        $course->discount=$request->discount;
        $course->seats=$request->seats;
        $course->status=0;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $course->img=$filename;
        if($course->save()){
            $req=new Irequest();
            $req->admin_status=0;
            $req->sub_status=0;
            $req->course_id=$course->id;
            $req->save();
            return back()->with('success',' Course added successfully, wait admin to accept.');

        }

        
    }

    public function enrolls(){
        $pg=12;
        $instructor=Instructor::find(auth()->guard('instructor')->user()->id);
        $courses=$instructor->courses;
        return view('instructor.enrolls',compact(['pg','courses']));
    
    }
    public function add_course(){
        $pg=4;
        return view('instructor.add_course',compact(['pg']));
    
    }

    public function my_courses($id){

        $courses=Course::all()->where('instuctor_id','=',$id);
        $pg=50;
        return view('instructor.courses',compact(['pg','courses']));
    
    }

    public function accept($id){
        $req=Application::find($id);
        $req->status=1;
        $req->save();
        return back();

        
    }

    public function refuse($id){

        $req=Application::find($id);
        $req->status=2;
        $req->save();
        return back();
    }

 

    public function login(){
        $pg=0;

    	return view('instructor.login',compact(['pg']));
    }

    public function check_login(Request $request)
    {   
        $remmberme = $request->remmberme==1?true:false;
        if(auth()->guard('instructor')->attempt(['instructor_id'=>$request->instructor_id,'password'=>$request->password],$remmberme)){
            return redirect('/');
        }else{
            session()->flash('error','please enter valid ID and password');
            return back()->with(['message'=>'please enter valid ID and password']);
        }
    }

    public function logout()
    {
        auth()->guard('instructor')->logout();
        return redirect('/instructor/login');

    } 
}
