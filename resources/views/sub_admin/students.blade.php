@extends('layouts.subAdminMaster') 
@section('title') Students | AOU
@endsection
 
@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Students</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
  <div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
      <ul>
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
        <li><i class="fa fa-angle-right"></i><span>Students</span></li>
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
      <table class="table table-hovered table-bordered table-stripped">
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Address</th>
          <th>Branch</th>
          <th>Level</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        @foreach($students as $student)
        <tr>
          @foreach ($student as $std)
          <td>{{$std->id}}</td>
          <td>
            @if(auth()->guard('subadmin')->user())
            <a href="{{url('/student/profile',['id'=>$std->id])}}">{{$std->name}}</a> @endif @if(auth()->guard('instructor')->user())
            <a href="{{url('/istudent/profile',['id'=>$std->id])}}">{{$std->name}}</a> @endif
          </td>
          <td><address>{{$std->address}}<address></td>
           
            <td>{{App\Branch::where('id', $std->branch_id)->first()->name }}</td> 
         
                <td>{{$std->level}}</td> 
                <td>@if(auth()->guard('subadmin')->user())
                  <a href="{{url('sadmin/stdedit',['id'=>$std->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                  @endif
                  @if(auth()->guard('instructor')->user())
                  <a href="{{url('instr/stdedit',['id'=>$std->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                  @endif
                </td>
                <td>@if(auth()->guard('subadmin')->user())
                  <a href="{{url('sadmin/delstd',['id'=>$std->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                @endif
              @if(auth()->guard('instructor')->user())
                  <a href="{{url('instr/delstd',['id'=>$std->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                @endif</td>
                @endforeach
              </tr>             
              @endforeach
            </table>
        </div>
      </div>

</div>
</div>
</div>
@endsection