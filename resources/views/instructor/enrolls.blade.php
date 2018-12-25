@extends('layouts.master') 
@section('title') Enrolls | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
    <div class="b-inner-page-header__content">
        <div class="container">
            <h1 class="f-primary-l c-default">Enrolls</h1>
        </div>
    </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i>Instructor</a></li>
                <li><i class="fa fa-angle-right"></i><span>Requests</span></li>
            </ul>
        </div>
    </div>

    @if(count($courses)) @foreach($courses as $course)

    <?php $apps=App\Application::where('course_id','=',$course->id)->where('status','=','1')->get();?> @if(count($apps))
<div class="b-pagination"> {{ $courses->links() }}</div>
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2 col-sm-8">
            <table class="table table-hovered table-bordered table-stripped">
                <tr>
                    <th>Course</th>
                    <th>Branch</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                @foreach($apps as $app)
                <?php $student = App\Student::where('student_id',$app->student_id)->first()?>
                <tr>
                    <td>{{$course->name}}</td>
                    <td>{{$course->branch->name}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone_number}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endif @endforeach @else
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2">
            <div class="b-tagline-box b-tagline-box--big">
                <div class="f-tagline_description b-tagline_description">
                    <p style="font-size:20px;text-align:center">There are no Student enrolls in your Courses</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection