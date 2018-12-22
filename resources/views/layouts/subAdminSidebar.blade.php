<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                             <span data-feather="users"></span>  Sub Admin Profile</a>
                                <ul class="collapse list-unstyled" id="profile">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/profile',['id'=>auth()->guard('subadmin')->user()])}}">
                                                <span data-feather="file-text"></span>My Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/profile')}}">
                                                 <span data-feather="file-text"></span>Edit Profile</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                  {{--   <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">
                    
                            <li class="nav-item">
                                <a href="#sub_admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                 <span data-feather="users"></span> Sub Admins</a>
                                <ul class="collapse list-unstyled" id="sub_admin">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/sub')}}">
                                         <span data-feather="file-text"></span>View All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/addsub')}}">
                                     <span data-feather="file-text"></span>Add Sub Admin</a>
                                    </li>
                                </ul>
                                  
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">

                            <li class="nav-item">
                                <a href="#instructors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                                    <span data-feather="users"></span> Instructors</a>
                                <ul class="collapse list-unstyled" id="instructors">
                               
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url( '/sadmin/instructors')}}">
                                                                       <span data-feather="file-text"></span>View All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/requests')}}">
                                                                         <span data-feather="file-plus"></span>Course Requests</a>
                                    </li>
                                 </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{-- {{route( 'users.index')}} --}}"><span data-feather="users"></span>Customers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                                      <span data-feather="users"></span>
                                      Managers
                                    </a>
                    </li>
 
                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">

                            <li class="nav-item">
                                <a href="#students" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                <span data-feather="bar-chart-2"></span>Students</a>
                                <ul class="collapse list-unstyled" id="students">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/students')}}">
                                                                <span data-feather="file-text"></span>View All
                                                            </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/student/enrolls')}}">
                                                               <span data-feather="file-plus"></span>Enrolls in Courses
                                                            </a>
                                    </li>
  
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/messages')}}"> <span data-feather="layers"></span>Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/invoices/all')}}"> <span data-feather="layers"></span>Invoices</a>
                    </li>

                   
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{-- {{route( 'admin.changepwd')}} --}}">
                        <span data-feather="lock"></span>
                      Change Password <span class="sr-only">(current)</span>
                     </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>