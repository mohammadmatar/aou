<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Instructor;
use App\Course;
use App\Field;
use App\Student;
use App\Contact;
use App\Sign;
use Illuminate\Http\Request;
use App\Http\Requests\SignRequest;
class SiteController extends Controller
{
    public function courses(){
        $pg=2;
        $courses=Course::where('status','1')->paginate(6);
    	return view('courses',compact(['pg','courses']));
    }

    public function search_courses(Request $request){
        $pg=15;
        $courses=Course::where('name','like', '%'.$request->search. '%')->get();
        return view('search',compact(['pg','courses']));
    }

    public function course_details($id){
        $pg=15;
        $course=Course::find($id);
        $cname=$course->name;
        $related=Course::where('name','like', '%'.$cname. '%')->get()->take(3);
        return view('course_details',compact(['course','pg','related']));
    }

    public function field_courses($id){
        $pg=15;
        $courses=Course::where('field_id',$id)->where('status','1')->paginate(6);
       // dd($courses);
        return view('field_courses',compact(['courses','pg']));
    }

    public function send_message(Request $request){

        $contact=new Contact();
        $contact->name=$request->name;
        $contact->subject=$request->subject;
        $contact->content=$request->content;
        $contact->email=$request->email;
        $contact->save();
         //session()->flash('success','Message sent successfully');
            return back()->with(['success'=>'Message sent successfully']);

        
    }

    public function sign(SignRequest $request){

        $sign=new Sign();
        $sign->name=$request->name;
        $sign->summary=$request->summary;
        $sign->instructor_id=$request->instructor_id;
        $sign->address=$request->address;
        $sign->email=$request->email;
        $sign->password=$request->password;
        $sign->status=0;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $sign->img=$filename;

        $file1 = $request->file('cv');
        $filename1 = time() . '.' . $file1->getClientOriginalName();
        $path1 = 'uploads';
        $file1->move($path1, $filename1);
        $sign->cv=$filename1;

        $sign->save();
            return back()->with(['success'=>'Registered successfully waiting admin']);
        
    }


    public function branch_courses($id){
        $pg=9;
        $courses=Course::where('branch_id',$id)->where('status','1')->paginate(6);
    	return view('branch_courses',compact(['courses','pg']));
    }

    public function about(){
        $pg=5;
    	return view('about',compact(['pg']));
    }

    public function contact(){
        $pg=6;
    	return view('contact',compact(['pg']));
    }

    

    public function home(){
      $courses=Course::all()->take(3);
      $instructors=Instructor::all()->take(4);
      $fields=Field::all();
      $pg=1;
    return view('home',compact(['courses','instructors','fields','pg']));

    }
}
