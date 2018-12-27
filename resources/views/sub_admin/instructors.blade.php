@extends('layouts.subAdminMaster') 
@section('title') Instructors | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Instructors</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
  <div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
      <ul>
        <li><a href="{{url('/sdashboard')}}"><i class="fa fa-home"></i>Home</a></li>
        <li><i class="fa fa-angle-right"></i><span>Instructors</span></li>
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
  @endif @if(!is_null($insts))

  {{-- <div class="b-pagination"> {{ $insts->links() }}</div> --}}
  <div class="row b-shortcode-example">
    <div class="col-md-8 col-md-offset-2 col-sm-8">
      <table class="table table-hovered table-bordered table-stripped">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>

        @foreach($insts as $inst)
        
        <tr>
          @if(auth()->guard('admin')->user())
          <td> <a href="{{url('/ainstructor/profile',['id'=>$inst->id])}}">{{$inst->name}}</a></td>
          <td>{{$inst->email}}</td>
          <td>{{$inst->phone_number}}</td>
          <td><a href="{{url('admin/instedit',['id'=>$inst->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
          <td><a href="{{url('admin/delinst',['id'=>$inst->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
          @endif @if(auth()->guard('subadmin')->user())
          <td><a href="{{url('/sinstructor/profile',['id'=>$inst->id])}}">{{$inst->name}}</a></td>
          <td>{{$inst->email}}</td>
          <td>{{$inst->phone_number}}</td>
          <td><a href="{{url('sadmin/instedit',['id'=>$inst->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
          <td><a href="{{url('sadmin/delinst',['id'=>$inst->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
          @endif
        </tr>
        @endforeach
      </table>
    </div>
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