<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Course;
use App\Field;
use App\Http\Requests\SignRequest;
use App\Instructor;
use App\Mail\Welcome;
use App\Sign;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class SiteController extends Controller
{
    public function courses()
    {
        $pg = 2;
        $courses = Course::where('status', '1')->paginate(6);
        return view('courses', compact(['pg', 'courses']));
    }

    public function search_courses(Request $request)
    {
        $pg = 15;
        $courses = Course::where('name', 'like', '%' . $request->search . '%')->paginate(3);
        if (!is_null($courses)) {
            return view('search', compact(['pg', 'courses']));
        }
        return back()->with(['error', 'There are no courses available baised on your inputs']);
    }

    public function course_details($id)
    {
        $pg = 15;
        $course = Course::find($id);
        $cname = $course->name;
        $related = Course::where('name', 'like', '%' . $cname . '%')->get()->take(3);
        return view('course_details', compact(['course', 'pg', 'related']));
    }

    public function field_courses($id)
    {
        $pg = 15;
        $courses = Course::where('field_id', $id)->where('status', '1')->paginate(6);
        // dd($courses);
        return view('field_courses', compact(['courses', 'pg']));
    }

    public function send_message(Request $request)
    {

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->content = $request->content;
        $contact->email = $request->email;
        $contact->save();
        //session()->flash('success','Message sent successfully');
        return back()->with(['success' => 'Message sent successfully']);

    }

    public function sign(SignRequest $request)
    {
        $validator = $this->validate(request(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255|unique:signs,email',
            'password' => 'required|min:6',
            'phone_number' => 'numeric|min:8',
            'cv' => 'required|mimes:pdf',
            'img' => ' mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator) {

            $sign = new Sign();
            $sign->name = $request->name;
            $sign->instructor_id = $request->instructor_id;
            $sign->address = $request->address;
            $sign->email = $request->email;
            $sign->phone_number = $request->phone_number;
            $sign->password = Hash::make($request->password);
            $sign->token = str_random(25) . time();
            $sign->status = 0;
            $filecv = $request->file('cv');
            if (!is_null($filecv)) {
                $filenamecv = time() . '.' . $filecv->getClientOriginalName();
                $pathcv = 'uploads/cv';
                $filecv->move($pathcv, $filenamecv);
                $sign->cv = $filenamecv;
            }
             $fileimg = $request->file('img');
            if (!is_null($fileimg)) {
                $filenameimg = time() . '.' . $fileimg->getClientOriginalName();
                $pathimg = 'img/instructors';
                $fileimg->move($pathimg, $filenameimg);
                $sign->img = $filenameimg;
            }

            $sign->save();
            //Mail::to($sign)->send(new Welcome($sign));

            return redirect(route('instructor.login'))->with('status', 'Registered Completed successfully, Please wait for admin approval');
        }
        return redirect(route('instructor.login')->with('status', $validator->errors));

    }

    public function confirmation($token)
    {
        $student = new Student();
        $student = $student->where('token', $token)->first();
        if (!is_null($student)) {
            $student->confirmed = 1;
            $student->token = str_random(25) . time();
            $student->save();
            return redirect(route('student.login'))->with('status', 'Your activation is completed.');
        }
        return redirect(route('student.login'))->with('status', 'Something went wrong, Maybe the Link is expired');

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

    public function branch_courses($id)
    {
        $pg = 9;
        $courses = Course::where('branch_id', $id)->where('status', '1')->paginate(6);
        return view('branch_courses', compact(['courses', 'pg']));
    }

    public function about()
    {
        $pg = 5;
        return view('about', compact(['pg']));
    }

    public function contact()
    {
        $pg = 6;
        return view('contact', compact(['pg']));
    }

    public function home()
    {
        $courses = Course::where('status', '1')->take(3);
        $instructors = Instructor::all()->take(4);
        $fields = Field::all();
        $pg = 1;
        return view('home', compact(['courses', 'instructors', 'fields', 'pg']));

    }
}
