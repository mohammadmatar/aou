@extends('layouts.adminMaster')
@section('title')
Admin Messages | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Messages</h1>
    </div>
  </div>
</div>
<div class="l-main-container">
     <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
{{--                 <li><a href=""><i class="fa fa-angle-right"></i>Admin</a></li> --}}
                <li><i class="fa fa-angle-right"></i><span>Messages</span></li>
            </ul>
        </div>
    </div> 
    @foreach($contacts as $contact)
    <div class="b-pagination"> {{ $contacts->links() }}</div>
    <div class="row b-shortcode-example">
          <div class="col-md-8 col-md-offset-2">
              <div class="b-tagline-box b-tagline-box--big">
                  <div class="b-tagline_title f-tagline_title f-primary-l">Name: {{$contact->name}}</div>
                  <div class="f-tagline_description b-tagline_description">
                     Email: {{$contact->email}}
                  </div>
                  <div class="f-tagline_description b-tagline_description">
                    Subject:  {{$contact->subject}}
                  </div>
                  <div class="f-tagline_description b-tagline_description">
                    Body:  {{$contact->content}}
                  </div>

              </div>
          </div>
      </div>
      @endforeach
      

@endsection