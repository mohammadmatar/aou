@extends('layouts.master')
@section('title')
Applicants | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Applicants</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Applicants</span></li>
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
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Branch</th>
                <th>Level</th>
                
              </tr>
              @foreach($apps as $app)
              <tr>
                <td><img class="j-data-element" data-animate="fadeInDown" style="height: 100px; width: 100px;" data-retina src="/img/{{App\Student::find($app->student_id)->img}}" alt=""/></td>
                <td>
                  <a href="{{url('/sstd/profile',['id'=>App\Student::find($app->student_id)->id])}}">{{App\Student::find($app->student_id)->name}}</a>
                </td>
                <td>{{App\Student::find($app->student_id)->email}}</td>
                <td>{{App\Student::find($app->student_id)->phone}}</td>
                <td>{{App\Student::find($app->student_id)->Address}}</td>
                <td>@if(!empty(App\Branch::where('id',App\Student::find($app->student_id)->branch_id)->first()->name))
                  {{App\Branch::where('id',App\Student::find($app->student_id)->branch_id)->first()->name}}
                @endif</td> 
                <td>{{App\Student::find($app->student_id)->level}}</td> 
                
              </tr>
              @endforeach
              
            </table>

        </div>
      </div>

</div>
</div>
</div>


@endsection