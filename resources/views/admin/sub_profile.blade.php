@extends('layouts.adminMaster') 
@section('title') Sub Admin Profile | AOU
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
        <li><a href="{{url('/adashboard')}}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{url('/admin/sub')}}"><i class="fa fa-angle-right"></i>Sub Admin</a></li>
        <li><i class="fa fa-angle-right"></i><span>Profile</span></li>
      </ul>
    </div>
  </div>
  <div class="row b-shortcode-example">

    <div class="col-md-6 col-md-offset-3 col-sm-6">
      <div class="b-shortcode-example f-center">
        <div class="b-mention-item b-mention-item--vertically">
          <div class="b-mention-item__user_img" style="height: 120px; width: 120px;">
            <img {{-- class="fade-in-animate" --}} data-retina src="/img/sub_admins/{{$sub->img}}" alt="">
          </div>
          <div class="b-mention-item__comment">
            <div class="f-mention-item__user_name f-primary-b">Name : {{$sub->name}}</div>
            <div class="b-mention-item__comment_text f-mention-item__comment_text">ID : {{$sub->sub_admin_id}}</div>
            <div class="b-mention-item__comment_text f-mention-item__comment_text">Email : {{$sub->email}}</div>
            <div class="b-mention-item__comment_text f-mention-item__comment_text">Phone Number : {{$sub->phone_number}}</div>
            <div class="b-mention-item__comment_text f-mention-item__comment_text">Address: {{$sub->address}}</div>
            <div class="f-mention-item__user_position">Branch: @if(!empty(App\Branch::where('sub_admin_id',$sub->id)->first())) {{App\Branch::where('sub_admin_id',$sub->id)->first()->name}}
              @endif
            </div>
            <div class="b-mention-item__comment_text f-mention-item__comment_text">Summary : {{$sub->summary}}</div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection