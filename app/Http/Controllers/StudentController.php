<?php

namespace App\Http\Controllers;

use App\Application;
use App\Mail\Welcome;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class StudentController extends Controller
{

    public function register()
    {
        $pg = 40;
        return view('student.register', compact(['pg']));
    }

    public function my_profile($id)
    {
        $pg = 38;
        $profile = Student::find($id);
        return view('student.profile', compact(['profile', 'pg']));
    }

    public function edit_profile()
    {
        $pg = 38;
        $std = Student::find(auth()->guard('student')->user()->id);
        return view('student.edit_profile', compact(['pg', 'std']));
    }

    function print($id) {
        $app = Application::find($id);

        return view('student.print', compact(['app', 'pg']));

    }

    public function cancel($id)
    {
        $pg = 47;
        $app = Application::find($id);
        return view('student.cancel', compact(['app', 'pg']));

    }

    public function cancelation(Request $request)
    {
        //dd($request);
        $req = Application::find($request->app_id);
        $req->notes = $request->notes;
        $req->status = 3;
        $req->save();
        return redirect('student/enrolls');

    }

    public function update_profile(Request $request)
    {
        $std = Student::find($request->sid);
        $std->name = $request->name;
        $std->Address = $request->address;
        $std->level = $request->level;
        $std->branch_id = $request->branch_id;
        $std->password = Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img/students';
        $file->move($path, $filename);
        $std->img = $filename;
        $std->update();
        return back()->with('success', ' Profile updated successfully');

    }

    public function save_std(Request $request)
    {
        $validator = $this->validate(request(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255|unique:students',
            'password' => 'required|min:6',
            'phone_number' => 'numeric|min:8',
        ]);

        if ($validator) {
            $student = new Student();

            $student->name = $request['name'];
            $student->student_id = Student::max('student_id') + 1;
            $student->email = $request['email'];
            $student->phone_number = $request['phone_number'];
            $student->address = $request['address'];
            $student->branch_id = $request['branch_id'];
            $student->level = $request['level'];
            $student->password = Hash::make($request['password']);
            $student->token = str_random(25) . time();

            $student->save();

            Mail::to($student)->send(new Welcome($student));

            return redirect(route('student.login'))->with('status', 'Confirmation email has been send, Please check your email');
        }
        return redirect(route('student.login')->with('status', $validator->errors));

    }

    public function login()
    {
        $pg = 0;
        return view('student.login', compact(['pg']));
    }

    public function resendConfirm(Request $request)
    {
        $student = new Student();
        $student = $student->where('email', $request->email)->first();

        if (!is_null($student)) {
            $student->confirmed = 0;
            $student->token = str_random(25) . time();
            $student->save();
            Mail::to($student)->send(new Welcome($student));
            return redirect(route('student.login'))->with('status', 'Confirmation email has been send, Please check your email');
        }
    }

    public function is_confirmed($email)
    {
        $student = Student::where('email', $email)->first();
       
        if (!is_null($student)) {
            if ($student->confirmed != 0) {
                return true;
            }
        }else{
            return back()->with(['error' => 'please enter valid ID and password']);
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
            $email = $request->email;
            return back()->with(['error' => 'please confirm your email address', 'email' => $email]);
        }

        if (!auth()->guard('student')->attempt(request(['email', 'password'], $remmberme))) {
            return back()->with(['error' => 'please enter valid ID and password']);
        }

        return redirect('/');
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
        $pg = 80;
        if (!auth()->guard('student')->user()) {
            return redirect('/student/login');
        } else {
            return view('student.apply', compact(['pg', 'id']));
        }

    }

    public function apply_course(Request $request)
    {
        $validator = $this->validate(request(), [
            'inv_img' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $student_id = auth()->guard('student')->user()->id;
        $application = Application::where('student_id', '=', $student_id)->where('course_id', '=', $request->course_id)->get();
        if ($application->isNotEmpty()) {
            return back()->with('error', ' You applied to this course before');
        } else {
            $app = new Application();
            $test = Application::where('inv_no', $request->inv_no)->get();
            if ($test->isNotEmpty()) {
                return back()->with('error', ' this invo is used before....');
            } else {
                $app->course_id = $request->course_id;
                $app->student_id = $student_id;
                $app->inv_no = $request->inv_no;
                $app->acc_no = $request->acc_no;
                $app->bank_name = $request->bank_name;
                $file = $request->file('inv_img');
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'img/invoices';
                $file->move($path, $filename);
                $app->inv_img = $filename;
                $app->save();
                return back()->with('success', ' You applied to this Course successfully');
            }
        }

    }

    public function enrolls()
    {
        $pg = 11;
        $applications = Application::where('student_id', '=', auth()->guard('student')->user()->id)->get();
        //dd($applications);
        return view('student.enrolls', compact(['pg', 'applications']));
    }

}
