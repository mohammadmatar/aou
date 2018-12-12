<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Application;
use App\Branch;
use App\Contact;
use App\Course;
use App\Instructor;
use App\Request as Arequest;
use App\Sign;
use App\Student;
use App\SubAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function invoices()
    {
        $pg = 100;

        return view('admin.invoices', compact(['pg']));

    }

    public function admin_requests()
    {
        $reqs = Arequest::where('admin_status', '=', '0')->get();
        $pg = 3;
        return view('admin.requests', compact(['pg', 'reqs']));
    }
    public function admin_branches()
    {
        $branches = Branch::all();
        $pg = 25;
        return view('admin.branches', compact(['pg', 'branches']));
    }

    public function admin_instructors()
    {
        $insts = Instructor::all();
        $pg = 28;
        return view('admin.instructors', compact(['pg', 'insts']));
    }

    public function add_brn()
    {
        $pg = 25;
        return view('admin.add_branch', compact(['pg']));
    }

    public function edit_brn($id)
    {
        $pg = 25;
        $brn = Branch::find($id);
        return view('admin.edit_branch', compact(['pg', 'brn']));
    }

    public function add_inst()
    {
        $pg = 28;
        return view('admin.add_instructor', compact(['pg']));
    }

    public function edit_inst($id)
    {
        $pg = 28;
        $instructor = Instructor::find($id);
        return view('admin.edit_instructor', compact(['pg', 'instructor']));
    }

    public function edit_sub($id)
    {
        $pg = 26;
        $sub = SubAdmin::find($id);
        return view('admin.edit_sub', compact(['pg', 'sub']));
    }

    public function add_sub()
    {
        $pg = 26;
        return view('admin.add_sub_admin', compact(['pg']));
    }

    public function applicants($id)
    {
        $pg = 26;
        $apps = Application::where('course_id', '=', $id)->get();
        return view('admin.applicants', compact(['pg', 'apps']));
    }

    public function student_profile($id)
    {
        $pg = 34;
        $profile = Student::find($id);
        return view('sub_admin.student_profile', compact(['profile', 'pg']));
    }

    public function resume($id)
    {
        $pg = 14;
        $req = Sign::find($id);
        return view('admin.resume', compact(['req', 'pg']));
    }

    public function save_sub(Request $request)
    {
        $sub = new SubAdmin();
        $sub->name = $request->name;
        $sub->Address = $request->address;
        $sub->password = Hash::make($request->password);
        $sub->sub_admin_id = SubAdmin::max('sub_admin_id') + 1;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'sub_admins';
        $file->move($path, $filename);
        $sub->img = $filename;
        $sub->save();
        return back()->with('success', ' Sub Admin added successfully');

    }

    public function save_brn(Request $request)
    {
        $brn = new Branch();
        $brn->name = $request->name;
        $brn->location = $request->location;
        $brn->sub_admin_id = $request->sub_admin_id;
        $brn->save();
        return back()->with('success', ' Branch added successfully');
    }

    public function ed_sub(Request $request)
    {
        $sub = SubAdmin::find($request->sid);
        $sub->name = $request->name;
        $sub->Address = $request->address;
        $sub->password = Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'sub_admins';
        $file->move($path, $filename);
        $sub->img = $filename;
        $sub->update();
        return back()->with('success', ' Sub Admin updated successfully');

    }

    public function ed_inst(Request $request)
    {
        $instructor = Instructor::find($request->sid);
        //$instructor = Instructor::where('email', $request->email)->first();

        if ($instructor) {
           // $instructor->email = $request->email;
            $instructor->name = $request->name;
            $instructor->address = $request->address;
            $instructor->phone_number = $request->phone_number;
            if (!is_null($request->file('cv'))) {
                $file = $request->file('cv');
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'cv';
                $file->move($path, $filename);
                $instructor->cv = $filename;
            }
            $instructor->update();
            return back()->with('success', ' Instructor updated successfully');
        }
        return back()->with('error', ' Something went wrong');
    }

    public function save_inst(Request $request)
    {
        $inst = new Instructor();
        $inst->name = $request->name;
        $inst->Address = $request->address;
        //$inst->summary = $request->summary;
        $inst->password = Hash::make($request->password);
        $inst->instructor_id = Instructor::max('instructor_id') + 1;
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $inst->img = $filename;
        $inst->save();
        return back()->with('success', ' Instructor added successfully');
    }

    public function ed_brn(Request $request)
    {
        $brn = Branch::find($request->bid);
        $brn->name = $request->name;
        $brn->location = $request->location;
        $brn->sub_admin_id = $request->sub_admin_id;
        $brn->update();
        return back()->with('success', ' Branch updated successfully');

    }

    public function update_profile(Request $request)
    {
        $admin = Admin::find($request->aid);
        $admin->name = $request->name;
        $admin->Address = $request->address;
        $admin->summary = $request->summary;
        $admin->password = Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'img';
        $file->move($path, $filename);
        $admin->img = $filename;
        $admin->update();
        return back()->with('success', ' Profile updated successfully');

    }

    public function del_sub($id)
    {
        $sub = SubAdmin::find($id)->delete();
        return back()->with(['success' => 'successfully deleted...']);
    }

    public function del_inst($id)
    {
        $sub = Instructor::find($id)->delete();
        return back()->with(['success' => 'successfully deleted...']);
    }

    public function del_brn($id)
    {
        $brn = Branch::find($id)->delete();
        return back()->with(['success' => 'successfully deleted...']);
    }

    public function admin_profile($id)
    {
        $pg = 24;
        $profile = Admin::find($id);
        return view('admin.profile', compact(['profile', 'pg']));
    }

    public function sub_profile($id)
    {
        $pg = 26;
        $sub = SubAdmin::find($id);
        return view('admin.sub_profile', compact(['sub', 'pg']));
    }

    public function edit_profile()
    {
        $pg = 24;
        return view('admin.edit_profile', compact(['pg']));
    }

    public function admin_sub_admins()
    {
        $subs = SubAdmin::all();
        $pg = 26;
        return view('admin.sub_admins', compact(['pg', 'subs']));
    }

    public function signs()
    {
        $reqs = Sign::where('status', '=', '0')->get();
        $pg = 14;
        return view('admin.signs', compact(['pg', 'reqs']));
    }

    public function login()
    {
        $pg = 0;
        return view('admin.login', compact(['pg']));
    }

    public function messages()
    {
        $contacts = Contact::all();
        $pg = 13;
        return view('admin.messages', compact(['contacts', 'pg']));

    }

    public function accept($id)
    {
        $req = Arequest::find($id);
        //dd($req);
        $req->admin_status = 1;
        $c = Course::find($req->course_id);
        $c->status = 1;
        $req->save();
        $c->save();
        return back();

    }

    public function accept_sign($id)
    {
        $sign = Sign::find($id);
        $instructor = new Instructor();
        $instructor->name = $sign->name;
        $instructor->instructor_id = $sign->instructor_id;
        $instructor->email = $sign->email;
        $instructor->phone_number = $sign->phone_number;
        $instructor->address = $sign->address;
        $instructor->cv = $sign->cv;
        $instructor->password = $sign->password;
        $sign->status = 1;
        $instructor->status = 1;
        $instructor->token = $sign->token;
        $sign->save();
        $instructor->save();
        return back();

    }

    public function refuse_sign($id)
    {
        $sign = Sign::find($id);
        $sign->status = 2;
        $sign->save();
        return back();
    }

    public function check_login(Request $request)
    {

        $remmberme = $request->remmberme == "on" ? true : false;

        if (!auth()->guard('admin')->attempt(request(['admin_id', 'password'], $remmberme))) {
            return back()->with(['error' => 'please enter valid ID and password']);
        }

        return redirect('/');

    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');

    }
}
