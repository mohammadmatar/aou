@extends('layouts.master')
@section('title')
Instructor Login | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Sign In</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Instructor</a></li>
                <li><i class="fa fa-angle-right"></i><span>Login</span></li>
            </ul>
        </div>
    </div>
    <div class="container b-container-login-page">
    @if (session()->has('error'))
     <div class="b-shortcode-example">
            <div class="b-alert-warning f-alert-warning">
              <div class="b-right">
                <i class="fa fa-times-circle-o"></i>
              </div>
              <div class="b-remaining">
                <i class="fa fa-exclamation-triangle"></i> {{session()->get('error')}}
              </div>
            </div>
          </div>
    @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="b-log-in-form">
                    <div class="f-primary-l f-title-big c-secondary">Log In</div>
                    <p>Login now to enjoy AOU full services and functions.</p>
                    <hr class="b-hr" />
                    <form action="{{url('/check/instructor')}}" method="post">
                        {{csrf_field()}}
                    <div class="b-form-row b-form-inline b-form-horizontal">
                        <div class="col-xs-12">
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Your ID</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" id="create_account_email" required name="instructor_id" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Your password</label>
                                <div class="b-form-horizontal__input">
                                    <input type="password" id="create_account_password" name="password" required class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <div class="b-form-horizontal__label"></div>
                                <label for="contact_form_copy" class="b-contact-form__window-form-row-label">
                                    <input type="checkbox" name="remmberme" id="contact_form_copy" class="b-form-checkbox" />
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <div class="b-form-row">
                                <div class="b-form-horizontal__label"></div>
                                <div class="b-form-horizontal__input">
                                    <button type="submit" class="b-btn f-btn b-btn-md b-btn-default f-primary-b b-btn__w100">Log in now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection