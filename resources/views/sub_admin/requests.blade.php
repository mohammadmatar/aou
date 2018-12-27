@extends('layouts.subAdminMaster') 
@section('title') Admin Requests | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
    <div class="b-inner-page-header__content">
        <div class="container">
            <br>
            <br>
            <h1 class="f-primary-l c-default">Course Approval</h1>
            <h6 style="font-size:15px;text-align:center">Each course shown here has been approved by the Riyadh admin</h6>
        </div>
    </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/sdashboard')}}"><i class="fa fa-home"></i>Home</a></li>
                {{--
                <li><a href=""><i class="fa fa-angle-right"></i>Admin</a></li> --}}
                <li><i class="fa fa-angle-right"></i><span>Approval</span></li>
            </ul>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="b-shortcode-example">
        <div class="b-alert-success f-alert-success">
            <div class="b-right">
                <i class="fa fa-times-circle-o"></i>
            </div>
            <div class="b-remaining">
                <i class="fa fa-check-circle-o"></i> {{session()->get('success')}}
            </div>
        </div>
    </div>
    @endif

    @if(count($reqs))
    <div class="b-pagination"> {{ $reqs->links() }}</div>
 
    @foreach($reqs as $req)

    <?php $course=App\Course::find($req->course_id); ?>
    @if($course->branch_id==App\Branch::where('sub_admin_id',auth()->guard('subadmin')->user()->id)->first()->id)
  
    
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2">
            <div class="b-tagline-box b-tagline-box--big">
                <div class="b-tagline_title f-tagline_title f-primary-l">Course Name : {{$course->instructor->name}}</div>
                <div class="b-tagline_title f-tagline_title f-primary-l">{{$course->branch->name}} Branch</div>
                <div class="b-tagline_title f-tagline_title f-primary-l">This course is accepted by Riyadh admin</div>
                <div class="b-tagline_btn f-center b-tagline_btn--right">
                    <a href="{{url('sadmin/accept',['id'=>$req->id])}}" class="button-sm button-green-bright"><i class="fa fa-check"></i></a>
                </div>
                <div class="b-tagline_btn f-center b-tagline_btn--right">
                    <a href="{{url('sadmin/refuse',['id'=>$req->id])}}" class="button-sm button-red"><i class="fa fa-ban"></i></a>
                </div>
                <div class="f-tagline_description b-tagline_description">
                    Course Summary :{{$course->summary}}
                </div>

            </div>
        </div>
    </div>
    @endif @endforeach @else
    <div class="row b-shortcode-example">
        <div class="col-md-8 col-md-offset-2">
            <div class="b-tagline-box b-tagline-box--big">
                <div class="f-tagline_description b-tagline_description">
                    <p style="font-size:20px;text-align:center">There are no courses requests</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection