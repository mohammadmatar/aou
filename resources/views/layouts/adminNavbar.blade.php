{{-- Manager New Customer Edit Customer Delete Customer New Account Edit Account Delete Account Deposit Withdrawal Fund Transfer
Change Password Balance Enquiry Mini Statement Customized Statement Login & Logout --}}



<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#{{-- user profile --}}">
        @auth
        {{ Auth::guard('admin')->user()->name }}
         @endauth
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
       {{--      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a> --}}
            {{-- <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link" >{{ __('Logout') }}</button>
            </form> --}}
<a href="{{route('admin.logout')}}">Logout</a>
        </li>
    </ul>
    
</nav>
 
    
