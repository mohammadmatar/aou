@extends('layouts.master')
@section('title')
Sub Admins | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Sub Admins</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Sub Admin</span></li>
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
    <div class="row b-shortcode-example">
    <div class="col-md-8 col-md-offset-2 col-sm-8">
             <table class="table table-hovered table-bordered">
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Branch</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach($subs as $sub)
              <tr>
                <td><img class="j-data-element" data-animate="fadeInDown" style="height: 100px; width: 100px;" data-retina src="/sub_admins/{{$sub->img}}" alt=""/></td>
                <td><a href="{{url('/sub/profile',['id'=>$sub->id])}}">{{$sub->name}}</a></td>
                <td>{{$sub->Address}}</td>
                <td>@if(!empty(App\Branch::where('sub_admin_id',$sub->id)->first()->name))
                  {{App\Branch::where('sub_admin_id',$sub->id)->first()->name}}
                @endif</td>
                
                <td><a href="{{url('admin/subedit',['id'=>$sub->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                <td><a href="{{url('admin/delsub',['id'=>$sub->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              @endforeach
              
            </table>

        </div>
      </div>

</div>
</div>
</div>


@endsection