<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Course;
use App\Instructor;
use App\Mail\Welcome;
use App\Request as Srequest;
use App\Student;
use App\SubAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:subadmin', ['except' => ['logout', 'login', 'check_login']]);
    }

    public function index()
    {
        return view('sub_admin.dashboard');
    }

    /* public function edit_brn($id)
    {
    $pg = 45;
    $brn = Branch::find($id);
    //dd($brn);
    return view('sub_admin.edit_branch', compact(['pg', 'brn']));
    } */

    public function update_profile(Request $request)
    {
        $sub = SubAdmin::find($request->sid);
        if ($sub) {
            $sub->name = $request->name;
            $sub->email = $request->email;
            $sub->phone_number = $request->phone_number;
            $sub->address = $request->address;
            $sub->summary = $request->summary;
            $sub->password = Hash::make($request->password);
            $file = $request->file('img');
            if ($file) {
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'img/sub_admins';
                $file->move($path, $filename);
                $sub->img = $filename;
            }
            $sub->update();
            return back()->with('success', ' Sub Admin updated successfully');
        }

    }
    public function sadmin_profile($id)
    {
        $pg = 24;
        $profile = SubAdmin::find($id);
        return view('sub_admin.profile', compact(['profile', 'pg']));
    }

    public function edit_profile()
    {
        $pg = 24;
        return view('sub_admin.edit_profile', compact(['pg']));
    }

    public function sadmin_requests()
    {
        $reqs = Srequest::where('sub_status', '=', '0')->get();
        $pg = 7;
        return view('sub_admin.requests', compact(['pg', 'reqs']));
    }

    public function login()
    {
        $pg = 0;
        return view('sub_admin.login', compact(['pg']));
    }

/*
public function check_login(Request $request)
{
$remmberme = $request->remmberme == 1 ? true : false;
if (auth()->guard('subadmin')->attempt(['sub_admin_id' => $request->sub_admin_id, 'password' => $request->password], $remmberme)) {
return redirect('/');
} else {
session()->flash('error', 'please enter valid ID and password');
return back()->with(['message' => 'please enter valid ID and password']);
}
} */

    public function check_login(Request $request)
    {
        $remmberme = $request->remmberme == "on" ? true : false;

        if (!auth()->guard('subadmin')->attempt(request(['sub_admin_id', 'password'], $remmberme))) {
            return back()->with(['error' => 'please enter valid ID and password']);
        }
        return redirect()->intended(route('sub_admin.dashboard'));
    }

    public function accept($id)
    {
        $req = Srequest::find($id);
        $req->sub_status = 2;
        $c = Course::find($req->course_id);
        $c->status = 0;
        $req->save();
        $c->save();
        return back();

    }

    public function refuse($id)
    {

        $req = Srequest::find($id);
        $req->sub_status = 2;
        $c = Course::find($req->course_id);
        $c->status = 0;
        $req->save();
        $c->save();
        return back();
    }

    public function logout()
    {
        auth()->guard('subadmin')->logout();
        return redirect(route('sub_admin.login'));
    }

    public function sadmin_students()
    {
        $sub = auth()->guard('subadmin')->user()->id;

        $branchs = Branch::where('sub_admin_id', $sub)->get();
        
        /* if ($sub) {
        if (!is_null($branch)) {

        $branch = $branch->name;
        dd($branch);
        }
         */
        // get the same student in the same branch for the admin
        foreach ($branchs as $branch) {
            $student = Student::where('branch_id', $branch->id)->get();
            if(!is_null($student)){
                $students[] = $student;
            }
        }
         
        $pg = 34;
        return view('sub_admin.students', compact(['pg', 'students']));

    }

    public function student_profile($id)
    {
        $pg = 34;
        $profile = Student::find($id);
        return view('sub_admin.student_profile', compact(['profile', 'pg']));
    }

    public function add_std()
    {
        $pg = 34;
        return view('sub_admin.add_student', compact(['pg']));
    }

    public function edit_std($id)
    {
        $pg = 34;
        $std = Student::find($id);
        return view('sub_admin.edit_student', compact(['pg', 'std']));
    }
    public function ed_std(Request $request)
    {
        $std = Student::find($request->sid);
        $std->name = $request->name;
        $std->Address = $request->address;
        $std->level = $request->level;
        $std->level = $request->level;
        $std->email = $request->email;
        $std->branch_id = $request->branch_id;
        $std->password = Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img/students';
        $file->move($path, $filename);
        $std->img = $filename;
        $std->update();
        return back()->with('success', ' Student updated successfully');

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

    public function show_instructors()
    {
        $insts = Instructor::paginate(5);
        $pg = 28;
        return view('sub_admin.instructors', compact(['pg', 'insts']));
    }

    public function del_std($id)
    {
        $sub = Student::find($id)->delete();
        return back()->with(['success' => 'successfully deleted...']);
    }
}
