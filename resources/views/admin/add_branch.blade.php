@extends('layouts.master')
@section('title')
Add Branch | AOU
@endsection

@section('content')


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Add Branch</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Add Branch</span></li>
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
                    <div class="f-primary-l f-title-big c-secondary">Add Branch</div>
                    <hr class="b-hr" />
                    <form action="{{url('/admin/savbrn')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="b-form-row b-form-inline b-form-horizontal">
                        <div class="col-md-12 col-md-offset-2">
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Name</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" name="name" id="create_account_email" class="form-control" />
                                </div>
                            </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Location</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" name="location" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                         
                         <div class="b-form-row">
                          <label class="b-form-horizontal__label" for="create_account_email">Sub Admin</label>
                          <div class="b-form-horizontal__input b-form-select c-arrow-secondary">
                          <select required="" class="j-select" name="sub_admin_id">
                          @foreach(App\SubAdmin::all() as $sub)
                             <option value="{{$sub->id}}">{{$sub->name}}</option>
                        @endforeach
                         </select>
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