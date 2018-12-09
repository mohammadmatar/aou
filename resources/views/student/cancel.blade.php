@extends('layouts.master')
@section('title')
Student Cancelation | AOU
@endsection

@section('content')


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Course Cancelation</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Course Cancelation</span></li>
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
                    <div class="f-primary-l f-title-big c-secondary">Course Cancelation</div>
                    <p>Invoice info required</p>
                    <hr class="b-hr" />
                    <form action="{{url('/cors/cancel')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="b-form-row b-form-inline b-form-horizontal">
                        <div class="col-md-12 col-md-offset-2">
                          
                           <input type="hidden"  name="app_id" value="{{$app->id}}">


                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Inv#</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" disabled="" name="inv_no" value="{{$app->inv_no}}" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Bank name</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" disabled="" name="bank_name" value="{{$app->bank_name}}" id="create_account_email" class="form-control" />
                                </div>
                            </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Account#</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" disabled="" value="{{$app->acc_no}}" name="acc_no" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                         <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Notes</label>
                                <div class="b-form-horizontal__input">
                                    <textarea class="form-control" required="" name="notes" placeholder="notes" rows="5"></textarea>
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