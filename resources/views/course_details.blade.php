@extends('layouts.master')
@section('title')
Course detail | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page_2">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-secondary-l c-white">Course detail</h1>
      <div class="f-secondary-l c-white f-inner-page-header_title-add">This is listing of cources for education website</div>
    </div>
  </div>
</div>

<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs b-bg-breadcrumbs">
        <div class="container">
            <ul>
                <li class="f-secondary-l"><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li class="f-secondary-l"><i class="fa fa-angle-right"></i><a href="{{url('/courses/index')}}">Courses</a></li>
                <li class="f-secondary-l c-primary"><i class="fa fa-angle-right"></i><span>Detail</span></li>
            </ul>
        </div>
    </div>
    <section class=" b-infoblock">

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
            <div class="f-carousel-secondary b-portfolio__example-box f-some-examples-tertiary b-carousel-reset b-carousel-arr-square b-carousel-arr-square--big f-carousel-arr-square">
                <div class="b-carousel-title f-carousel-title f-carousel-title__color f-secondary-b">
                    {{$course->name}}
                    <div class="b-arrow-title-box f-arrow-title-box">

                    </div>
                </div>
                <div class="b-portfolio-slider-box__items">
                    <div class="b-slider-images j-slider-images">
                        <img class="" data-retina="" style="height: 400px; width: 250px;" src="/img/courses/{{$course->img}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="b-education-detail-box b-diagonal-line-bg-light b-infoblock">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="b-tabs f-tabs j-tabs b-tabs-reset">
                        <ul>
                            <li><a href="#tabs-21">Description</a></li>
                        </ul>
                        <div class="b-tabs__content">
                            <div id="tabs-21">
                                <h4 class="f-tabs-vertical__title f-primary-b">Course description</h4>
                                <p>{{$course->summary}}</span></p>
                    
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="f-secondary-b f-title-b-hr f-h4-special f-title-medium">More about the course</div>
                    <div class="b-information-box f-information-box f-primary-b b-information--max-size">
                        <ul>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Branch</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{$course->branch->name}}</span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Field</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{$course->field->name}}</span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Duration</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{$course->hours}} Hours</span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Instructor</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{$course->instructor->name}}</span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Fees/Discount</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{$course->price}}$/{{$course->discount}}$</span>
                            </li>
                            @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('admin')->user())
                            <li>
                                <span class="f-information_data"> <a href="{{url('course/apply',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Apply now</a></span>
                            </li>
                           @endif

                           @if(auth()->guard('admin')->user())
                           <li>
                                <span class="f-information_data"> <a href="{{url('course/applicants',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Applicants</a></span>
                            </li>
            
                            @endif

                           @if(auth()->guard('instructor')->user()&&$course->instuctor_id==auth()->guard('instructor')->user()->id)
                            <li>
                                <a href="{{url('course/edit',['id'=>$course->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                              <a href="{{url('course/delete',['id'=>$course->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                             </li>
                             <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Applicants#: </strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">{{App\Application::where('course_id',$course->id)->count()}}</span>
                                 
                             </li>
                           @endif

                        </ul>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container b-infoblock--without-border">
        <div class="f-secondary-b f-title-b-hr">related courses</div>
        <div class="row b-shortcode-example">
             @foreach($related as $course)
      <div class="col-sm-4 col-xs-12">
        <div class="b-some-examples__item f-some-examples__item">
          <div class="b-some-examples__item_img view view-sixth">
    <a href="{{url('course/details',['id'=>$course->id])}}"><img class="j-data-element" data-animate="fadeInDown" style="height: 200px;" data-retina src="/img/{{$course->img}}" alt=""/></a>
    <div class="b-item-hover-action f-center mask">
        <div class="b-item-hover-action__inner">
            <div class="b-item-hover-action__inner-btn_group">
                <a href="" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
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
              <a href="{{url('course/details',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Apply now</a>
            </div>
            @endif
            @if(auth()->guard('admin')->user())

            <div class="b-right">
              <a href="{{url('course/applicants',['id'=>$course->id])}}" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Applicants</a>
            </div>
            @endif
            <div class="b-remaining b-some-examples__item_total f-some-examples__item_total">${{$course->price}}/ Student</div>
          </div>
        </div>
      </div>
      @endforeach

            <div class="clearfix hidden-sm hidden-xs"></div>
        </div>
    </section>

</div>


@endsection