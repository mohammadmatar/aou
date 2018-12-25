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
    <?php $cnt=0; ?> @foreach($courses as $course)
    <?php $apps=App\Application::where('course_id','=',$course->id)->where('status',0)->get();
    ?> @if($apps->isNotEmpty()) @foreach($apps as $app)
    <?php $cnt++;?>
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2">


            <div class="b-tagline-box b-tagline-box--big">
                <center><img src="/img/invoices/{{$app->inv_img}}" style="height: 150px; width: 200px;"></center>
                <label style="color: green;">Name: </label> {{App\Student::where('id','=',$app->student_id)->first()->name}}<br>
                <label style="color: green;">Branch: </label> {{$course->branch->name}}
                <br>
                <label style="color: green;">Invoice#: </label> {{$app->inv_no}}
                <br>
                <label style="color: green;">Account#: </label> {{$app->acc_no}}
                <br>
                <div class="b-tagline_btn f-center b-tagline_btn--right">
                    <a href="{{url('instructor/accept',['id'=>$app->id])}}" class="button-sm button-green-bright"><i class="fa fa-check"></i></a>
                </div>
                <div class="b-tagline_btn f-center b-tagline_btn--right">
                    <a href="{{url('instructor/refuse',['id'=>$app->id])}}" class="button-sm button-red"><i class="fa fa-ban"></i></a>
                </div>
                <div class="b-tagline_btn f-center b-tagline_btn--right">
                    <a href="{{url('instructor/print',['id'=>$app->id])}}" class="button-sm button-turquoise"><i class="fa fa-print"></i></a>
                </div>
                <div class="f-tagline_description b-tagline_description">
                    <label style="color: green;">Description: </label> {{$course->summary}}
                </div>

            </div>

        </div>
    </div>
    @endforeach @endif @endforeach 
    
    @if($cnt==0)
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2">
            <div class="b-tagline-box b-tagline-box--big">
                <div class="f-tagline_description b-tagline_description">
                   <p style="font-size:20px;text-align:center"> No enrolls in your courses yet.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection