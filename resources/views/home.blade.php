@extends('layouts.master') 
@section('title') Home | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>


<div class="l-main-container">
  <div class="b-slidercontainer b-slider">
    <div class="j-fullscreenslider j-arr-hide">
      <ul>
        <li data-transition="slotfade-vertical" data-slotamount="7">
          <div class="tp-bannertimer"></div>
          <img data-retina src="img/slider/slider-education.jpg">
          <div class="caption lft caption-left" data-x="left" data-y="150" data-hoffset="60" data-speed="700" data-start="2000">
            <div class="b-slider-lg-info-l__item-title f-slider-lg-info-l__item-title b-slider-lg-info-l__item-title-tertiary b-bg-slider-lg-info-l__item-title">
              <h2 class="f-primary-l">AOU</h2>
              <h1 class="f-primary-b">Arab Open University</h1>
            </div>
          </div>
          <div class="caption lfl caption-left" data-x="left" data-y="270" data-speed="1000" data-start="2600">
            <div class="b-slider-lg-info-l__item-link f-slider-lg-info-l__item-link">
              <a href="#" class="b-slider-lg-info-l__item-anchor f-slider-lg-info-l__item-anchor f-primary-b">Welcome to AOU</a>
              <span class="b-slider-lg-info-l__item-link-after"><i class="fa fa-chevron-right"></i></span>
            </div>
          </div>
        </li>
        <li data-transition="slotfade-vertical" data-slotamount="7">
          <div class="tp-bannertimer"></div>
          <img data-retina src="img/slider/slider-ed-1.jpg">
          <div class="caption lft caption-left" data-x="left" data-y="150" data-hoffset="60" data-speed="700" data-start="2000">
            <div class="b-slider-lg-info-l__item-title f-slider-lg-info-l__item-title b-slider-lg-info-l__item-title-tertiary">
              <h2 class="f-primary-l">AOU </h2>
              <h1 class="f-primary-b">Arab Open University</h1>
            </div>
          </div>
          <div class="caption lfl caption-left" data-x="left" data-y="270" data-speed="1000" data-start="2600">
            <div class="b-slider-lg-info-l__item-link f-slider-lg-info-l__item-link">
              <a href="#" class="b-slider-lg-info-l__item-anchor f-slider-lg-info-l__item-anchor f-primary-b">Welcome to AOU</a>
              <span class="b-slider-lg-info-l__item-link-after"><i class="fa fa-chevron-right"></i></span>
            </div>
          </div>
        </li>
        <li data-transition="slotfade-vertical" data-slotamount="7">
          <div class="tp-bannertimer"></div>
          <img data-retina src="img/slider/slider-ed-2.jpg">
          <div class="caption lft caption-left" data-x="left" data-y="150" data-hoffset="60" data-speed="700" data-start="2000">
            <div class="b-slider-lg-info-l__item-title f-slider-lg-info-l__item-title b-slider-lg-info-l__item-title-tertiary">
              <h2 class="f-primary-l">AOU </h2>
              <h1 class="f-primary-b">Arab Open University</h1>
            </div>
          </div>
          <div class="caption lfl caption-left" data-x="left" data-y="270" data-speed="1000" data-start="2600">
            <div class="b-slider-lg-info-l__item-link f-slider-lg-info-l__item-link">
              <a href="#" class="b-slider-lg-info-l__item-anchor f-slider-lg-info-l__item-anchor f-primary-b">Welcome to AOU</a>
              <span class="b-slider-lg-info-l__item-link-after"><i class="fa fa-chevron-right"></i></span>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <section class="b-bg-full-primary">
    <div class="container">
      <div class="b-categories-icons">


        @foreach($fields as $field)
        <div class="b-categories-icons__item f-categories-icons__item b-column">
          <a class="b-categories-icons__item_link" href="{{url('/courses/field',['id'=>$field->id])}}">
            <div class="b-categories-icons__item_icon f-categories-icons__item_icon fade-in-animate">
              @if($field->id==1)
              <i class="fa fa-briefcase"></i> @endif @if($field->id==2)
              <i class="fa fa-anchor"></i> @endif @if($field->id==3)
              <i class="fa fa-gavel"></i> @endif @if($field->id==4)
              <i class="fa fa-puzzle-piece"></i> @endif @if($field->id==5)
              <i class="fa fa-flask"></i> @endif
            </div>
            <div class="b-remaining b-categories-icons__item_text">
              <div class="b-categories-icons__item_name f-categories-icons__item_name f-secondary-b">{{$field->name}}</div>
              <div class="b-categories-icons__item_info f-categories-icons__item_info f-secondary-l">AOU {{$field->name}} Field Courses Explore it now </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="b-infoblock f-center">
    <div class="container">

      <h2 class="f-secondary-l">Our <strong class="f-secondary-b">Courses</strong></h2>

      <p class="b-infoblock-description f-desc-section f-secondary-l f-small">start with us to strengthen yours skills to meet the market needs .</p>
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
      @endif @if (session()->has('error'))
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

      <div class="b-some-examples f-some-examples f-secondary row">
        @foreach($courses as $course)
        <div class="col-sm-4 col-xs-12">
          <div class="b-some-examples__item f-some-examples__item">
            <div class="b-some-examples__item_img view view-sixth">
              <a href="{{url('course/details',['id'=>$course->id])}}"><img class="j-data-element" data-animate="fadeInDown" style="height: 200px;" data-retina src="img/{{$course->img}}" alt=""/></a>
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
              @endif @if(auth()->guard('admin')->user())

              <div class="b-right">
                <a href="{{url('course/applicants',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Applicants</a>
              </div>
              @endif
              <div class="b-remaining b-some-examples__item_total f-some-examples__item_total">${{$course->price}}/ Student</div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <section class="b-infoblock b-diagonal-line-bg-light b-employee">
      <div class="container">
        <h3 class="f-center f-secondary-b">WE’RE Arab Open university</h3>
        <h2 class="b-infoblock-description f-center f-secondary-l">meet our Instructors</h2>
        <div class="b-employee-container row">
          @foreach($instructors as $instructor)
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="b-employee-item b-employee-item--color f-employee-item">
              <div class=" view view-sixth">
                <a href="{{url('/inst/profile',['id'=>$instructor->id])}}"><img class="j-data-element" style="height: 250px;" data-animate="fadeInDown" data-retina src="/img/{{$instructor->img}}" alt=""/></a>
                <div class="b-item-hover-action f-center mask">
                  <div class="b-item-hover-action__inner">
                    <div class="b-item-hover-action__inner-btn_group">
                      <a href="{{url('/inst/profile',['id'=>$instructor->id])}}" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="f-primary-b">{{$instructor->name}}</h4>
              <div class="b-employee-item__position f-employee-item__position">{{$instructor->address}}</div>
              <p>{{$instructor->summary}}</p>

            </div>
          </div>
          @endforeach

        </div>

      </div>

    </section>
    <div class="b-info-container f-info-container">
      <div class="container">
        <div class="b-info-container__title f-info-container__title">
          <i class="fa fa-university"></i><br/>
          <span class="f-b f-secondary-b">AOU</span>
        </div>
        <p class="b-info-container__text f-info-container__text f-secondary-l-it">The Arab Open University (AOU) is a sustainable development and educational non-profit project. It was founded by
          HRH Prince Talal Bin Abdul-Aziz, Chairman of the AOU Board of Trustees. In September 2000, AOU was officially declared
          in the meeting of Arab ministers of higher education where five Arab countries offered to host the headquarters
          of AOU. Among them was Kuwait that was chosen to be the headquarters of AOU in December 2000. Today AOU has eight
          branches in Kuwait, Lebanon, Jordan, Saudi Arabia, Egypt, Bahrain, Oman and Sudan. <a href="http://aou.dev">http://aou.dev</a></p>
      </div>
    </div>
</div>
@endsection