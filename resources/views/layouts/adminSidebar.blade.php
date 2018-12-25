<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/adashboard">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">
                          {{--   @if(auth()->guard('admin')->user()) --}}
                            <li class="nav-item">
                                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                                    <span data-feather="users"></span>  Admin Profile</a>
                                <ul class="collapse list-unstyled" id="profile">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/profile',['id'=>auth()->guard('admin')->user()->id])}}">
                    <span data-feather="file-text"></span>My Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/profile')}}">
                     <span data-feather="file-text"></span>Edit Profile</a>
                                    </li>
                                </ul>
                            </li>

                      {{--      @elseif(auth()->guard('subadmin')->user()) --}}
                          {{--   <li class="nav-item">
                                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                                                                <span data-feather="users"></span>  Sub Admin Profile</a>
                                <ul class="collapse list-unstyled" id="profile">
                                    <li class="nav-item">
                                        <a class="nav-link" href="href="{{url('/sadmin/profile',['id'=>auth()->guard('subadmin')->user()->id])}}">
                                                <span data-feather="file-text"></span>My Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/profile')}}">
                                                 <span data-feather="file-text"></span>Edit Profile</a>
                                    </li>
                                </ul>
                            </li> --}}
                          {{--   @endif --}}
                        </ul>
                    </li>

                    <li class="nav-item">
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
                    </li>

                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">

                            <li class="nav-item">
                                <a href="#instructors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                                    <span data-feather="users"></span> Instructors</a>
                                <ul class="collapse list-unstyled" id="instructors">
{{--                                     @if(auth()->guard('admin')->user())
 --}}                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/instructors')}}">
                                        <span data-feather="file-text"></span>View All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sign/requests')}}">
                                         <span data-feather="file-plus"></span>Signs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/requests')}}">
                                        <span data-feather="file-minus"></span>Course Requests </a>
                                    </li>
{{--                                     @endif @if(auth()->guard('subadmin')->user())
 --}}                                 {{--    <li class="nav-item">
                                        <a class="nav-link" href="{{url( '/sadmin/instructors')}}">
                                                                       <span data-feather="file-text"></span>View All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/sadmin/requests')}}">
                                                                         <span data-feather="file-plus"></span>Course Requests</a>
                                    </li>
                                    @endif --}}
                                </ul>
                            </li>
                        </ul>
                    </li>

 
                    <li class="nav-item">
                        <ul class="list-unstyled components" style="padding-left:15px;display: block; padding: .5rem 1rem;">

                            <li class="nav-item">
                                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                <span data-feather="bar-chart-2"></span>Branches</a>
                                <ul class="collapse list-unstyled" id="reports">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/branches')}}">
                                                                <span data-feather="file-text"></span>View All
                                                            </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/addbrn')}}">
                                                               <span data-feather="file-plus"></span>Add New Branch
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

             
            </div>
        </nav>
    </div>
</div>