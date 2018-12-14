@extends('layouts.master') 
@section('title') Instructor Sign | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Signs</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
  <div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
      <ul>
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href=""><i class="fa fa-angle-right"></i>Sign</a></li>
        <li><i class="fa fa-angle-right"></i><span>Requests</span></li>
      </ul>
    </div>
  </div>
  @if(count($reqs))
  <div class="row b-shortcode-example">
    @foreach($reqs as $req)
    <div class="col-md-6 col-md-offset-3 col-sm-6">
      <div class="b-shortcode-example f-center">
        <div class="b-mention-item b-mention-item--vertically">
          <div class="b-mention-item__user_img" style="height: 120px; width: 120px;">
            <img class="fade-in-animate" data-retina src="/img/{{$req->img}}" alt="">
          </div>
          <div class="b-mention-item__comment">
            <div class="b-mention-item__user_info f-mention-item__user_info">
              <div class="f-mention-item__user_name f-primary-b">{{$req->name}}</div>
              <div class="f-mention-item__user_position">{{$req->address}}</div>
            </div>

            <div class="b-mention-item__comment_text f-mention-item__comment_text">{{$req->summary}}
            </div>
            <a href="{{url('sign/accept',['id'=>$req->id])}}" class="button-sm button-green-bright"><i class="fa fa-check"></i></a>
            <a href="{{url('sign/refuse',['id'=>$req->id])}}" class="button-sm button-red"><i class="fa fa-ban"></i></a>
            <a href="{{url('sign/resume',['id'=>$req->id])}}" class="button-sm button-turquoise-bright"><i class="fa fa-file"></i> Download CV</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
<div class="row b-shortcode-example">
    <div class="col-md-8 col-md-offset-2">
      <div class="b-tagline-box b-tagline-box--big">
        <div class="f-tagline_description b-tagline_description">
          <p style="font-size:20px;text-align:center">There are no Instructors in our Database</p>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection