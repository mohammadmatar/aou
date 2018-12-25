<?php

namespace App\Http\Controllers;

use App\Application;
use App\Course;
use App\Http\Requests\CourseReqeust;
use App\Instructor;
use App\Request as Irequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{

    public function register()
    {
        $pg = 40;
        return view('instructor.register', compact(['pg']));
    }

    function print($id) {
        $app = Application::find($id);

        return view('instructor.print', compact(['app', 'pg']));
    }

    public function my_profile($id)
    {
        $pg = 38;
        $profile = Instructor::find($id);
        return view('instructor.myprofile', compact(['profile', 'pg']));
    }

    public function edit_profile()
    {
        $pg = 38;
        $instructor = Instructor::find(auth()->guard('instructor')->user()->id);
        return view('instructor.edit_profile', compact(['pg', 'instructor']));
    }

    public function update_profile(Request $request)
    {

        $validator = $this->validate(request(), [
            'name' => 'string|min:2|max:255',
            'email' => 'required|email|unique:instructors,email,'.$request->id,
            'password' => 'min:6',
            'phone_number' => 'min:8',
            'cv' => 'mimes:pdf',
            'img' => 'mimes:jpeg,png,jpg,gif,svg',

        ]);

        $instructor = Instructor::where('email', $request->email)->first();

        if ($instructor) {
           // $instructor->email = $request->email;
            $instructor->name = $request->name;
            $instructor->address = $request->address;
            $instructor->phone_number = $request->phone_number;
            $instructor->password = Hash::make($request->password);

           if (!is_null($request->file('cv'))) {
                $file = $request->file('cv');
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'uploads/cv';
                $file->move($path, $filename);
                $instructor->cv = $filename;
            }
            if (!is_null($request->file('img'))) {
                $fileimg = $request->file('img');
                $filenameimg = time() . '.' . $fileimg->getClientOriginalName();
                $pathimg = 'img/instructors';
                $fileimg->move($pathimg, $filenameimg);
                $instructor->img = $filenameimg;
            } 
            $instructor->update();
            return back()->with('success', ' Profile updated successfully');
        }
    }

    public function instructor_profile($id)
    {
        $pg = 50;
        $instructor = Instructor::find($id);
        $courses = Course::all()->where('instuctor_id', '=', $id);
        return view('instructor.profile', compact(['pg', 'instructor', 'courses']));
    }

    public function edit_course($id)
    {
        $pg = 0;
        $course = Course::find($id);
        return view('instructor.edit_course', compact(['pg', 'course']));
    }

    public function delete_course($id)
    {
        $crs = Course::find($id)->delete();
        return redirect('/courses/index')->with(['success' => 'successfully deleted...']);
    }

    public function update_course(Request $request)
    {

        $course = Course::find($request->cid);
        $course->name = $request->name;
        $course->summary = $request->summary;
        $course->level = $request->level;
        $course->field_id = $request->field_id;
        $course->branch_id = $request->branch_id;
        $course->price = $request->fees;
        $course->hours = $request->hours;
        $course->discount = $request->discount;
        $course->seats = $request->seats;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img/courses';
        $file->move($path, $filename);
        $course->img = $filename;
        $course->update();

        return back()->with('success', ' Course updated successfully.');

    }

    public function save_course(CourseReqeust $request)
    {

        $course = new Course();
        $course->name = $request->name;
        $course->summary = $request->summary;
        $course->level = $request->level;
        $course->field_id = $request->field_id;
        $course->instuctor_id = auth()->guard('instructor')->user()->id;
        $course->branch_id = $request->branch_id;
        $course->price = $request->fees;
        $course->hours = $request->hours;
        $course->discount = $request->discount;
        $course->seats = $request->seats;
        $course->status = 0;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img/courses';
        $file->move($path, $filename);
        $course->img = $filename;
        if ($course->save()) {
            $req = new Irequest();
            $req->admin_status = 0;
            $req->sub_status = 0;
            $req->course_id = $course->id;
            $req->save();
            return back()->with('success', ' Course added successfully, wait admin to accept.');

        }

    }

    public function enrolls()
    {
        $pg = 12;
        $instructor = Instructor::find(auth()->guard('instructor')->user()->id);
        $courses = $instructor->courses;
        return view('instructor.enrolls', compact(['pg', 'courses']));

    }
    public function add_course()
    {
        $pg = 4;
        return view('instructor.add_course', compact(['pg']));

    }

    public function my_courses($id)
    {

        $courses = Course::all()->where('instuctor_id', '=', $id);
        $pg = 50;
        return view('instructor.courses', compact(['pg', 'courses']));

    }

    public function accept($id)
    {
        $req = Application::find($id);
        $req->status = 1;
        $req->save();
        return back();

    }

    public function refuse($id)
    {

        $req = Application::find($id);
        $req->status = 2;
        $req->save();
        return back();
    }

    public function login()
    {
        $pg = 0;

        return view('instructor.login', compact(['pg']));
    }

    public function is_confirmed($email)
    {
        $instructor = Instructor::where('email', $email)->first();
        if (!is_null($instructor) && ($instructor->status != 0)) {
            return true;
        }
    }

    public function check_login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $remmberme = $request->remmberme == "on" ? true : false;
        if (!$this->is_confirmed($request->email)) {

            return back()->with(['error' => 'please wait the admin to confirm your account']);
        }

        if (!auth()->guard('instructor')->attempt(request(['email', 'password'], $remmberme))) {
            return back()->with(['error' => 'please enter valid Email and password']);
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->guard('instructor')->logout();
        return redirect('/instructor/login');

    }
}
