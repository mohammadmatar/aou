@extends('layouts.master')
@section('title')
Enrolls | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Requests</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i>Student</a></li>
                <li><i class="fa fa-angle-right"></i><span>Requests</span></li>
            </ul>
        </div>
    </div>
    @foreach($applications as $application)
    <?php $course=App\Course::find($application->course_id); ?>
    <div class="row b-shortcode-example">
          <div class="col-md-8 col-md-offset-2">
              <div class="b-tagline-box b-tagline-box--big">
                  <div class="b-tagline_title f-tagline_title f-primary-l">{{$course->name}}</div>
                  @if($application->status==1)
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <span class="button-sm button-green-bright"><i class="fa fa-check"></i> accepted</span>
                      <a href="{{url('student/cancel',['id'=>$application->id])}}" class="button-sm button-red"><i class="fa fa-times-circle"></i></a>
                  </div>
                  @endif
                  @if($application->status==0)
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <span class="button-sm button-turquoise"><i class="fa fa-spinner fa-spin"></i> pending</span>
                      <a href="{{url('student/cancel',['id'=>$application->id])}}" class="button-sm button-red"><i class="fa fa-times-circle"></i></a>
                  </div>
                  @endif
                  @if($application->status==3)
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <span class="button-sm button-red"><i class="fa fa-times-circle"></i> canceld</span>
                      <a href="{{url('student/print',['id'=>$application->id])}}" class="button-sm button-turquoise"><i class="fa fa-print"></i></a>
                  </div>
                  @endif
                  @if($application->status==2)
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <span class="button-sm button-red"><i class="fa fa-ban fa-ban"></i> Refused</span>
                  </div>
                  @endif
                  @if($application->status!=3)
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                  <a href="{{url('instructor/print',['id'=>$application->id])}}" class="button-sm button-turquoise"><i class="fa fa-print"></i></a></div>
                  @endif
                  <div class="f-tagline_description b-tagline_description">
                      {{$course->summary}}

                  </div>

                </div>

              </div>
          </div>
      </div>
      @endforeach
      


@endsection