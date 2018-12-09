@extends('layouts.master')
@section('title')
Instructors | AOU
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
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
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
    @endif
    <div class="row b-shortcode-example">
    <div class="col-md-8 col-md-offset-2 col-sm-8">
             <table class="table table-hovered table-bordered table-stripped">
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Summary</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach($insts as $inst)
              <tr>
                <td><img class="j-data-element" data-animate="fadeInDown" style="height: 100px; width: 100px;" data-retina src="/img/{{$inst->img}}" alt=""/></td>
                <td>
                  @if(auth()->guard('admin')->user())
                  <a href="{{url('/ainstructor/profile',['id'=>$inst->id])}}">{{$inst->name}}</a>
                  @endif
                  @if(auth()->guard('subadmin')->user())
                  <a href="{{url('/sinstructor/profile',['id'=>$inst->id])}}">{{$inst->name}}</a>
                  @endif
                </td>
                <td>{{$inst->Address}}</td>
                <td>{{$inst->summary}}</td> 
                <td>
                  @if(auth()->guard('admin')->user())
                  <a href="{{url('admin/instedit',['id'=>$inst->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                  @endif
                  @if(auth()->guard('subadmin')->user())
                  <a href="{{url('sadmin/instedit',['id'=>$inst->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                  @endif
                </td>
                <td>
                  @if(auth()->guard('admin')->user())
                  <a href="{{url('admin/delinst',['id'=>$inst->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  @endif
                  @if(auth()->guard('subadmin')->user())
                  <a href="{{url('sadmin/delinst',['id'=>$inst->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  @endif
                  </td>
              </tr>
              @endforeach
              
            </table>

        </div>
      </div>

</div>
</div>
</div>


@endsection