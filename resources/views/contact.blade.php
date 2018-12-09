@extends('layouts.master')
@section('title')
Contact us | AOU
@endsection

@section('content')

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Contact us</h1>
    </div>
  </div>
</div>

<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><span> Contact us </span></li>
            </ul>
        </div>
    </div>

    <div class="b-desc-section-container">
        <section class="container b-welcome-box">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h1 class="is-global-title f-center">We’d like to hear from you!</h1>
                    <p class="f-center">start with us to strengthen yours skills to meet the market needs,The all courses you need will find in our website easily and fast to use. </p>
                </div>
            </div>
        </section>
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
        <section class="container">
            <div class="row">
                <div class="col-sm-6 b-contact-form-box">
                    <h3 class="f-primary-b b-title-description f-title-description">
                        Send now
                        <div class="b-title-description__comment f-title-description__comment f-primary-l">fast reply and care of our users. </div>
                    </h3>
                    <div class="row">
                        <form action="{{url('/message/send')}}" method="post">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="name">Name</label>
                                    <div class="b-form-vertical__input">
                                        <input type="text" name="name" required="" id="name" class="form-control" />
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="email">E-mail</label>
                                    <div class="b-form-vertical__input">
                                        <input type="text" name="email" required="" id="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="title">Subject</label>
                                    <div class="b-form-vertical__input">
                                        <input type="text" required="" name="subject" id="title" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="b-form-row b-form--contact-size">
                                    <label class="b-form-vertical__label">Message</label>
                                    <textarea name="content" required="" class="form-control" rows="23"></textarea>
                                </div>
                                <div class="b-form-row">
                                    <button type="submit" class="b-btn f-btn b-btn-md b-btn-default f-primary-b b-btn__w100">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 b-contact-form-box">
                    <h3 class="f-primary-b b-title-description f-title-description">
                        contact info
                        <div class="b-title-description__comment f-title-description__comment f-primary-l">this our contact information any time.</div>
                    </h3>
                    <div class="row b-google-map__info-window-address">
                        <ul class="list-unstyled">
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-home"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                AOU
            </div>
            <div class="desc"> P.O.Box 84901 Riyadh 11681, Prince Faisal,ksa.</div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-globe"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                portfolio homepage
            </div>
            <div class="desc">https://www.aou.edu.eg/</div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-skype"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Skype
            </div>
            <div class="desc">aou.ksa</div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-envelope"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                email
            </div>
            <div class="desc">aou@aou.com</div>
        </div>
    </li>
</ul>

                    </div>
                </div>
            </div>
        </section>
    </div>
   
</div>



@endsection