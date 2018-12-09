@extends('layouts.master')
@section('title')
Admin Profile | AOU
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
                <li><a href=""><i class="fa fa-angle-right"></i>Admin</a></li>
                <li><i class="fa fa-angle-right"></i><span>Profile</span></li>
            </ul>
        </div>
    </div>
    <div class="row b-shortcode-example">

    <div class="col-md-6 col-md-offset-3 col-sm-6">
          <div class="b-shortcode-example f-center">
            <div class="b-mention-item b-mention-item--vertically">
              <div class="b-mention-item__user_img" style="height: 120px; width: 120px;">
                <img  class="fade-in-animate" data-retina src="/img/{{$profile->img}}" alt="">
              </div>
              <div class="b-mention-item__comment">
                <div class="b-mention-item__user_info f-mention-item__user_info">
                <div class="f-mention-item__user_name f-primary-b">{{$profile->name}}</div>
                  <div class="f-mention-item__user_position">{{$profile->address}}</div>
                </div>

                <div class="b-mention-item__comment_text f-mention-item__comment_text">{{$profile->Address}}
                </div>
                <div class="b-mention-item__comment_text f-mention-item__comment_text">{{$profile->summary}}
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
       


@endsection