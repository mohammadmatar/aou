@extends('layouts.master')
@section('title')
Edit Courses | AOU
@endsection

@section('content')


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Edit course</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span>Edit course</span></li>
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
                    <div class="f-primary-l f-title-big c-secondary">Edit Course</div>
                    <hr class="b-hr" />
                    <form action="{{url('/edit/course')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="b-form-row b-form-inline b-form-horizontal">
                        <div class="col-md-12 col-md-offset-2">
                          <input type="hidden" name="cid" value="{{$course->id}}">
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Name</label>
                                <div class="b-form-horizontal__input">
                                    <input type="text" required="" value="{{$course->level}}" name="name" id="create_account_email" class="form-control" />
                                </div>
                            </div>
                         <div class="b-form-row">
                          <label class="b-form-horizontal__label" for="create_account_email">Field</label>
                          <div class="b-form-horizontal__input b-form-select c-arrow-secondary">
                          <select class="j-select" required="" name="field_id">
                          @foreach(App\Field::all() as $field)
                        <option value="{{$field->id}}" selected="{{$course->field_id}}">{{$field->name}}</option>
                        @endforeach
                      </select>
                          </div>
                      </div>

                         <div class="b-form-row">
                          <label class="b-form-horizontal__label" for="create_account_email">Branch</label>
                          <div class="b-form-horizontal__input b-form-select c-arrow-secondary">

                          <select required="" class="j-select" name="branch_id">
                             <option value="{{$course->branch_id}}">{{App\Branch::where('id',$course->branch_id)->first()->name}}
                            </option>
                          @foreach(App\Branch::all() as $branch)
                             @if($course->branch_id !== $branch->id)
                             <option value="{{$branch->id}}">{{$branch->name}}</option>
                             @endif
                        @endforeach
                         </select>
                          </div>
                      </div>

                      <div class="b-form-row">
                            <label class="b-form-horizontal__label" for="create_account_email">Photo</label>
                            <div class="b-form-horizontal__input">
                                <input type="file" name="img" id="img" class="btn btn-success btn-file" style=" height: 40px; width: 265px;" />
                            </div>
                        </div>

                      <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Level</label>
                                <div class="b-form-horizontal__input">
                                    <input type="number" required="" value="{{$course->level}}" name="level" id="create_account_password" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Hours</label>
                                <div class="b-form-horizontal__input">
                                    <input type="number" required="" value="{{$course->hours}}" name="hours" id="create_account_password" class="form-control" />
                                </div>
                            </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Discount</label>
                                <div class="b-form-horizontal__input">
                                    <input type="number" required="" value="{{$course->discount}}" name="discount" id="create_account_password" class="form-control" />
                                </div>
                            </div>

                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Seats</label>
                                <div class="b-form-horizontal__input">
                                    <input type="number" required="" value="{{$course->seats}}" name="seats" id="create_account_password" class="form-control" />
                                </div>
                            </div>


                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_password">Fees</label>
                                <div class="b-form-horizontal__input">
                                    <input type="number" value="{{$course->price}}" required="" name="fees" id="create_account_password" class="form-control" />
                                </div>
                            </div>
                            <div class="b-form-row">
                                <label class="b-form-horizontal__label" for="create_account_email">Details</label>
                                <div class="b-form-horizontal__input">
                                    <textarea class="form-control" required="" name="summary" placeholder="Details" rows="5">{{$course->summary}}</textarea>
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