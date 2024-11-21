   
   @extends('layouts.master')
   @section('content')
   <!-- ==========Banner Section Starts Here========== -->
   <section class="page-header bg_img" data-background="{{ asset('public/frontend_assets/images/banner/page-header.jpg')}}">
    <div class="container">
        <div class="page-header-content">
            <h1 class="title">Contact Us</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    Contact Us
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ==========Banner Section Ends Here========== -->


<!-- ==========Contact Section Starts Here========== -->
<section class="contact-section padding-top padding-bottom">
    <div class="container">
        <div class="contact-form-area">
            
            <h4 class="title">Leave A Message</h4>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
            {{-- <form class="contact-form" id="contact_form_submit"> --}}
             <form  class="contact-form" method="post" action="{{ url('/contactus') }}">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Your Name" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Your Email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="number" placeholder="Phone" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Subject" id="subject" name="subject">
                </div>
                <div class="form-group w-100">
                    <textarea name="message" id="message" id="message" placeholder="Your Message"></textarea>
                </div>
                <div class="form-group w-100 text-center">
                    <button class="custom-button" type="submit"><span>Send Message</span></button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- ==========Contact Section Ends Here========== -->


<!-- ==========Map Section Starts Here========== -->
<div class="map-section pos-rel">
 <div class="maps" style="position: relative; overflow: hidden;">
    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 236, 255);">
        
      
    </div>
    <div class="contact-area padding-bottom padding-top pt-lg-0 pb-lg-0">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-item">
                    <div class="contact-thumb">
                        <img src="{{ asset('public/frontend_assets/images/contact/01.png')}}" alt="contact">
                    </div>
                    <div class="contact-content">
                        <h6 class="title">Class Sessions</h6>
                        <ul>
                            <li>Sunday - Monday</li>
                            <li>08:00 am – 11:00 am (Fri Closed)</li>
                        </ul>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-thumb">
                        <img src="{{ asset('public/frontend_assets/images/contact/02.png')}}" alt="contact">
                    </div>
                    <div class="contact-content">
                        <h6 class="title">Abacus Address</h6>
                        <ul>
                            <li>{{ $BasicInfo->address }}</li>
                        </ul>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-thumb">
                        <img src="{{ asset('public/frontend_assets/images/contact/03.png')}}" alt="contact">
                    </div>
                    <div class="contact-content">
                        <h6 class="title">Openning Hours</h6>
                        <ul>
                            <li>Sunday - Monday</li>
                            <li>08.00 am – 05.00 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-thumb">
                        <img src="{{ asset('public/frontend_assets/images/contact/04.png')}}" alt="contact">
                    </div>
                    <div class="contact-content">
                        <h6 class="title">Phone & E-mail</h6>
                        <ul>
                            <li><a href="Tel:05210021020"> {{ $BasicInfo->mobile }}</a></li>
                            <li><a href="">{{ $BasicInfo->email }}</a></li>
                            {{-- <li><a href="Mailto:sfkljsdfsj@gmail.com">enroll@kittons.com</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========Map Section Ends Here========== -->
@endsection