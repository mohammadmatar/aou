@extends('layouts.master')
@section('title')
Instructor Profile | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Profile</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i>Instructor</a></li>
                <li><i class="fa fa-angle-right"></i><span>Profile</span></li>
            </ul>
        </div>
    </div>
    <div class="row b-shortcode-example">

    <div class="col-md-6 col-md-offset-3 col-sm-6">
          <div class="b-shortcode-example f-center">
            <div class="b-mention-item b-mention-item--vertically">
              <div class="b-mention-item__user_img" style="height: 120px; width: 120px;">
                <img  class="fade-in-animate" data-retina src="/img/{{$instructor->img}}" alt="">
              </div>
              <div class="b-mention-item__comment">
                <div class="b-mention-item__user_info f-mention-item__user_info">
                <div class="f-mention-item__user_name f-primary-b">{{$instructor->name}}</div>
                  <div class="f-mention-item__user_position">{{$instructor->Address}}</div>
                </div>

                <div class="b-mention-item__comment_text f-mention-item__comment_text">{{$instructor->summary}}
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="container">

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
    @if (session()->has('error'))
     <div class="b-shortcode-example">
            <div class="b-alert-warning f-alert-warning">
              <div class="b-right">
                <i class="fa fa-times-circle-o"></i>
              </div>
              <div class="b-remaining">
                <i class="fa fa-exclamation-triangle"></i> {{session()->get('error')}}
              </div>
            </div>
          </div>
    @endif
    <center><h2 class="f-secondary-l">Instructor <strong class="f-secondary-b">Courses</strong></h2></center>
        <div class="row">
            <div class="b-education-box b-infoblock">
                 @foreach($courses as $course)
      <div class="col-sm-4 col-xs-12">
        <div class="b-some-examples__item f-some-examples__item">
          <div class="b-some-examples__item_img view view-sixth">
    <a href="#"><img class="j-data-element" data-animate="fadeInDown" style="height: 200px;" data-retina src="/img/{{$course->img}}" alt=""/></a>
    <div class="b-item-hover-action f-center mask">
        <div class="b-item-hover-action__inner">
            <div class="b-item-hover-action__inner-btn_group">
                <a href="{{url('course/details',['id'=>$course->id])}}" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
            </div>
        </div>
    </div>
</div>
          <div class="b-some-examples__item_info">
            <div class="b-some-examples__item_info_level b-some-examples__item_name f-some-examples__item_name"><a href="{{url('course/details',['id'=>$course->id])}}">{{$course->name}}</a></div>
            <div class="b-some-examples__item_info_level b-some-examples__item_double_info f-some-examples__item_double_info">
              <div class="b-right">Duration: {{$course->hours}} Hour</div>
              <div class="b-remaining">Branch: {{$course->branch->name}}</div>
            </div>
            <div class="b-some-examples__item_info_level b-some-examples__item_description f-some-examples__item_description">
              {{details($course->summary,100)}}
            </div>
          </div>
          <div class="b-some-examples__item_action">
          @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('admin')->user())

            <div class="b-right">
              <a href="{{url('course/apply',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Apply now</a>
            </div>
            @endif
            <div class="b-remaining b-some-examples__item_total f-some-examples__item_total">${{$course->price}}/ Student</div>
          </div>
        </div>
      </div>
      @endforeach
                <div class="clearfix  hidden-sm"></div>
</div>
</div>
</div>


@endsection