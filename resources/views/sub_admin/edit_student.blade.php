@extends('layouts.master')
@section('title')
Edit Student | AOU
@endsection

@section('content')


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Edit Student</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Edit Student</span></li>
            </ul>
        </div>
    </div>
    <div class="container b-container-login-page">
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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="b-form">
                    <div class="f-primary-l f-title-big c-secondary">Edit Student</div>
                    <hr class="b-hr" />
                    @if(auth()->guard('subadmin')->user())
                    <form action="{{url('/sadmin/editstd')}}" method="post" enctype="multipart/form-data">
                      @endif
                      @if(auth()->guard('instructor')->user())
                    <form action="{{url('/instr/editstd')}}" method="post" enctype="multipart/form-data">
                      @endif
                      {{csrf_field()}}
                    <div class="b-form-row b-form-inline b-form-horizontal">
                        <div class="col-md-12 col-md-offset-2">
                          <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Student ID</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" value="{{$std->student_id}}" required="" name="student_id" id="create_account_email" readonly="" class="form-control" />
                                </div>
                            </div>

                                    <input type="hidden" value="{{$std->id}}" required="" name="sid"   />
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Name</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" value="{{$std->name}}" name="name" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Email</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" name="email" value="{{$std->email}}" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Phone</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" name="phone" value="{{$std->phone}}" id="create_account_email" class="form-control" />
                                </div>
                            </div>

                        <div class="b-form-row">
                          <label class="b-form-horizontal__label" for="create_account_email">Branch</label>
                          <div class="b-form-horizontal__input b-form-select c-arrow-secondary">

                          <select required="" class="j-select" name="branch_id">
                            <option value="{{$std->branch_id}}">{{App\Branch::where('id',$std->branch_id)->first()->name}}
                            </option>
                          @foreach(App\Branch::all() as $branch)
                            
                             @if($std->branch_id !== $branch->id)
                             <option value="{{$branch->id}}">{{$branch->name}}</option>
                             @endif
                        @endforeach
                         </select>
                          </div>
                      </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Level</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" value="{{$std->level}}" name="level" id="create_account_email" class="form-control" />
                                </div>
                            </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Address</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" value="{{$std->Address}}" name="address" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                         
                        <div class="b-form-row">
                          <label class="b-form-horizontal__label" for="create_account_email">Photo</label>
                          <div class="b-form-horizontal__input b-form-control__icon-wrap">
                              <span class="btn btn-success btn-file" style="margin-bottom: 10px;">
                           <i class="fa fa-image"></i> Choose photo <input type="file" required="" name="img" style=" opacity:0; height: 15px; width: 150px;" name="img">
                              </span>
                          </div>
                      </div>

                      <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Password</label>
                                <div class="b-form-horizontal__input">
                                    <input type="password" required="" name="password" id="create_account_email" class="form-control" />
                                </div>
                            </div>


                      
                            <div class="b-form-row">
                                <div class="b-form-horizontal__label"></div>
                                <div class="b-form-horizontal__input">
                                    <input type="submit" class="b-btn f-btn b-btn-md b-btn-default f-primary-b b-btn__w100" value="Save">
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection