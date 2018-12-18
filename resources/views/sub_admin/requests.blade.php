@extends('layouts.subAdminMaster')
@section('title')
Sub Requests | AOU
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
                <li><a href=""><i class="fa fa-angle-right"></i>Sub Admin</a></li>
                <li><i class="fa fa-angle-right"></i><span>Requests</span></li>
            </ul>
        </div>
    </div>
    @foreach($reqs as $req)
    <?php $course=App\Course::find($req->course_id); ?>
    @if($course->branch_id==App\Branch::where('sub_admin_id',auth()->guard('subadmin')->user()->id)->first()->id)
    <div class="row b-shortcode-example">
          <div class="col-md-8 col-md-offset-2">
              <div class="b-tagline-box b-tagline-box--big">
                  <div class="b-tagline_title f-tagline_title f-primary-l">{{$course->instructor->name}}</div>
                  <div class="b-tagline_title f-tagline_title f-primary-l">{{$course->branch->name}} Branch</div>
                   <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <a href="{{url('sadmin/accept',['id'=>$req->id])}}" class="button-sm button-green-bright"><i class="fa fa-check"></i></a>
                  </div>
                  <div class="b-tagline_btn f-center b-tagline_btn--right">
                      <a href="{{url('sadmin/refuse',['id'=>$req->id])}}" class="button-sm button-red"><i class="fa fa-ban"></i></a>
                  </div>
                  <div class="f-tagline_description b-tagline_description">
                      {{$course->summary}}
                  </div>

              </div>
          </div>
      </div>
      @endif
      @endforeach
      

@endsection