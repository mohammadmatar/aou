@extends('layouts.master') 
@section('title') Instructor Registeration | AOU
@endsection
 
@section('content')
<div class="j-menu-container">
</div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
    <div class="b-inner-page-header__content">
        <div class="container">
            <h1 class="f-primary-l c-default">Add Instructor</h1>
        </div>
    </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Instructor Registeration</span></li>
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
                    <div class="f-primary-l f-title-big c-secondary">Instructor Registeration</div>
                    <p>For Instructors</p>
                    <hr class="b-hr" />
                    <form action="{{url('/sign/instructor')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="b-form-row b-form-inline b-form-horizontal">
                            <div class="col-md-12 col-md-offset-2">
                                {{--
                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Instructor ID</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="text" value="{{App\Sign::max('instructor_id')+1}}" required="" name="instructor_id" id="instructor_id" readonly=""
                                            class="form-control" />
                                    </div>
                                </div> --}}
                                <input type="hidden" value="{{App\Sign::max('instructor_id')+1}}" required="" name="instructor_id" id="instructor_id">
                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Name</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="text" required="" name="name" id="name" value="{{ old('name') }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Email</label>
                                    <div class="b-form-horizontal__input">

                                        <input name="email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                            value="{{ old('email') }}" required> @if($errors->has('email'))
                                        <span class="invalid-feedback">
                                          <strong>{{ $errors->first('email') }}</strong>
                                           </span> @endif

                                    </div>
                                </div>

                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Phone Number</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="text" required="" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control"
                                        />
                                    </div>
                                </div>

                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Address</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="text" required="" name="address" id="address" value="{{ old('address') }}" class="form-control" />
                                    </div>
                                </div>


                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Password</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="password" required="" name="password" id="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="img">Your CV: </label>
                                    <div class="b-form-horizontal__input">
                                        <input type="file" name="cv" id="cv" required="" class="btn btn-success btn-file" style=" height: 40px; width: 265px;" />
                                    </div>
                                </div>

                                <div class="b-form-row">
                                    <label class="b-form-horizontal__label" for="create_account_email">Your Photo</label>
                                    <div class="b-form-horizontal__input">
                                        <input type="file" name="img" id="img" class="btn btn-success btn-file" style=" height: 40px; width: 265px;" />
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