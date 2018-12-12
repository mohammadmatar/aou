<header>
    <div class="container b-header__box b-relative">
        <a href="{{url('/')}}" class="b-left b-logo "><img class="color-theme" data-retina src="/img/logo-header-default.png" alt="Logo" /></a>
        <div class="b-header-r b-right b-header-r--icon">
            <div class="b-header-ico-group f-header-ico-group b-right">
                <form action="{{url('/courses/search')}}" method="get">
                    <span class="b-search-box">
              <i class="fa fa-search"  style="padding-top: 35px;"></i>
              <input type="text" name="search" placeholder="by course name"/>
          </span>
                </form>

            </div>
            <div class="b-top-nav-show-slide f-top-nav-show-slide b-right j-top-nav-show-slide"><i class="fa fa-align-justify"></i></div>
            <nav class="b-top-nav f-top-nav b-right j-top-nav">
                <ul class="b-top-nav__1level_wrap">
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==1){echo 'is-active-top-nav__1level';}?> f-primary-b"><a href="{{url('/')}}"><i class="fa fa-home b-menu-1level-ico"></i>Home <span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==25){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Branches<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/branches')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/addbrn')}}"><i class="fa fa-angle-right"></i>Add New</a></li>

                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==26){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Sub Admins<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/sub')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/addsub')}}"><i class="fa fa-angle-right"></i>Add New</a></li>

                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('admin')->user()||auth()->guard('subadmin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==28){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Instructors<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                @if(auth()->guard('admin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/instructors')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                @endif @if(auth()->guard('subadmin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/instructors')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                @endif @if(auth()->guard('admin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/addinst')}}"><i class="fa fa-angle-right"></i>Add New</a></li>
                                @endif @if(auth()->guard('subadmin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/addinst')}}"><i class="fa fa-angle-right"></i>Add New</a></li>
                                @endif @if(auth()->guard('admin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/requests')}}"><i class="fa fa-angle-right"></i>Requests</a></li>
                                @else
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/requests')}}"><i class="fa fa-angle-right"></i>Requests</a></li>
                                @endif

                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('subadmin')->user()/*||auth()->guard('instructor')->user()*/)
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==34){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Students<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                @if(auth()->guard('subadmin')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/students')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                @endif @if(auth()->guard('instructor')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instr/students')}}"><i class="fa fa-angle-right"></i>View All</a></li>
                                @endif @if(auth()->guard('instructor')->user())
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/enrolls')}}"><i class="fa fa-angle-right"></i>Enrolls</a></li>
                                @endif

                            </ul>
                        </div>
                    </li>
                    @endif @if(!auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==9){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Branches<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                @foreach(App\Branch::all() as $branch)
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/branch/courses',['id'=>$branch->id])}}"><i class="fa fa-angle-right"></i>{{$branch->name}}
                @if(auth()->guard('subadmin')->user()&&$branch->sub_admin_id==auth()->guard('subadmin')->user()->id)
                [Our Branch]
                @endif
                </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==2){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/courses/index')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Courses<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>

                    @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==14){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/sign/requests')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Signs<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==100){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/invoices/all')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Invoices<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==13){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/admin/messages')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Messages<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(auth()->guard('instructor')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==12){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/instructor/enrolls')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Enrolls<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(auth()->guard('instructor')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==4){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/add/course')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Add Course<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==6){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/contact/aou')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>Contact<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                    </li>
                    @endif @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==5){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="{{url('/about/aou')}}"><i class="fa fa-folder-open b-menu-1level-ico"></i>About<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>

                    </li>
                    @endif @if(auth()->guard('instructor')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>{{auth()->guard('instructor')->user()->name}}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/profile',['id'=>auth()->guard('instructor')->user()->id])}}"><i class="fa fa-angle-right"></i>My Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/profile')}}"><i class="fa fa-angle-right"></i>Edit Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/courses',['id'=>auth()->guard('instructor')->user()->id])}}"><i class="fa fa-angle-right"></i>My Courses</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/logout')}}"><i class="fa fa-angle-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('subadmin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>{{auth()->guard('subadmin')->user()->name}}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <?php $sub_id=auth()->guard('subadmin')->user()->id;
                $brn_id=App\Branch::where('sub_admin_id',$sub_id)->first()->id?>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/profile',['id'=>auth()->guard('subadmin')->user()->id])}}"><i class="fa fa-angle-right"></i>My Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/profile')}}"><i class="fa fa-angle-right"></i>Edit Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('admin/brnedit1',['id'=>$brn_id])}}"><i class="fa fa-angle-right"></i>Edit My Branch</a></li>

                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/logout')}}"><i class="fa fa-angle-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('student')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>{{auth()->guard('student')->user()->name}}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/std/profile',['id'=>auth()->guard('student')->user()->id])}}"><i class="fa fa-angle-right"></i>My Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/std/profile')}}"><i class="fa fa-angle-right"></i>Edit Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/student/enrolls')}}"><i class="fa fa-angle-right"></i>My Applications</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/student/logout')}}"><i class="fa fa-angle-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif @if(auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>{{auth()->guard('admin')->user()->name}}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/profile',['id'=>auth()->guard('admin')->user()->id])}}"><i class="fa fa-angle-right"></i>My Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/profile')}}"><i class="fa fa-angle-right"></i>Edit Profile</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/logout')}}"><i class="fa fa-angle-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </li>
                 {{--    @endif @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('student')->user()&&!auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level f-primary-b">
                        <a href="#" data-toggle="modal" data-target="#instructor"><i class="fa fa-folder-open b-menu-1level-ico"></i>New Instructor<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>

                    </li> --}}
                    @endif @if(!auth()->guard('instructor')->user()&&!auth()->guard('subadmin')->user()&&!auth()->guard('student')->user()&&!auth()->guard('admin')->user())
                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Login<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level_title f-top-nav__2level_title">Login As</li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/student/login')}}"><i class="fa fa-angle-right"></i>Student</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/login')}}"><i class="fa fa-angle-right"></i>Instructor</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/sadmin/login')}}"><i class="fa fa-angle-right"></i>Sub Admin</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/admin/login')}}"><i class="fa fa-angle-right"></i>Admin</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="b-top-nav__1level f-top-nav__1level <?php if($pg==0){echo 'is-active-top-nav__1level';}?> f-primary-b">
                        <a href="#"><i class="fa fa-folder-open b-menu-1level-ico"></i>Register<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        <div class="b-top-nav__dropdomn">
                            <ul class="b-top-nav__2level_wrap">
                                <li class="b-top-nav__2level_title f-top-nav__2level_title">Register As</li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/student/register')}}"><i class="fa fa-angle-right"></i>Student</a></li>
                                <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="{{url('/instructor/register')}}"><i class="fa fa-angle-right"></i>Instructor</a></li>
                            </ul>
                        </div>
                    </li>

                    @endif


                </ul>

            </nav>
        </div>
    </div>
</header>


{{--
<div class="modal fade" id="instructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">New Instructor</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/sign/instructor')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="instructor_id">ID: </label>

                            <input class="form-control" required="" readonly="" id="mo" value="{{App\Sign::max('instructor_id')+1}}" name="instructor_id"
                                type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="name">Name: </label>

                            <input class="form-control" required="" id="mo" name="name" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="name">Email: </label>

                            <input class="form-control" required="" id="mo" name="email" type="email">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="password">Password: </label>

                            <input class="form-control" required="" id="mo" name="password" type="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="address">Address: </label>

                            <input class="form-control" required="" id="mo" name="address" type="text">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="img">Photo: </label>

                            <span class="btn btn-success btn-file" style="margin-bottom: 10px;">
                        <i class="fa fa-image"></i> Choose photo <input type="file" style=" opacity:0; height: 15px; width: 150px;" name="img">
                    </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="img">Your CV: </label>

                            <span class="btn btn-success btn-file" style="margin-bottom: 10px;">
                        <i class="fa fa-file"></i> upload CV <input type="file" style=" opacity:0; height: 15px; width: 150px;" name="cv">
                    </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="mm" for="summary">Summary: </label>

                            <textarea class="form-control" required="" id="details" rows="4" name="summary"></textarea>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                        <p class="pull-left">Save this ID and your password and wait the admin to accept. </p>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div> --}}

@if(count($errors->all()) > 0)
<br>
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif