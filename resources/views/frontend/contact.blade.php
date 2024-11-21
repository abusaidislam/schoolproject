@extends('layouts.master')
@section('content')
    <!--Default Section / Other Info-->
    <section class="default-section other-info">
        <div class="auto-container">

            <div class="row clearfix">

                <!--Info Column-->
                <div class="column info-column col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <article class="inner-box">
                        <h3 class="margin-bott-20">Our Address</h3>
                        <ul class="info-box">
                            <li><span class="icon flaticon-location "></span><strong>Address</strong>
                                {{ $BasicInfo->address }}</li>
                            <li><span class="icon flaticon-technology-5"></span><strong>Phone</strong>
                                {{ $BasicInfo->mobile }}</li>
                            <li><span class="icon flaticon-interface-1"></span><strong>Email</strong>
                                {{ $BasicInfo->email }}</li>
                        </ul>
                    </article>
                </div>

                <!--Image Column-->
                <div class=" col-lg-7 col-md-6 col-sm-12 col-xs-12">
                    <article class="inner-box">
                        <figure class=""><img height="60%" width="60%"
                                style="margin-top: -50px; margin-left:80px"
                                src="{{ asset('/public/frontend_assets/images/icons/contractus.png') }}" alt="">
                        </figure>
                    </article>
                </div>

            </div>
        </div>
    </section>


    <!--Contact Section-->
    <section class="contact-section no-padd-top">
        <div class="auto-container">

            <div class="row clearfix">

                <!--Map Column-->
                <div class="map-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="mapouter" style="margin-top: 40px">
                            <div class="gmap_canvas"><iframe src="<?php echo $BasicInfo->google; ?>" frameborder="0" scrolling="no"
                                    style="width: 410px; height: 500px;"></iframe>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        height: 500px;
                                        width: 410px;
                                        background: #fff;
                                    }
                                </style><a href="https://www.eireportingonline.com/ircc-login/"
                                    style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ircc
                                    login</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        height: 500px;
                                        width: 410px
                                    }

                                    .gmap_canvas iframe {
                                        position: relative;
                                        z-index: 2
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Form Column-->
                <div class="column image-column col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <!--Form Column-->
                    <h2 class='text-dark'>Send Message</h2>
                    <!--COntact Form-->
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="inner-box contact-form">
                        <form method="post" action="{{ url('/contactus') }}">
                            @csrf
                            <div class="row clearfix">
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-xs-12">
                                    <input type="text" name="name" value="" placeholder="Your Name">
                                </div>

                                <div class="form-group col-md-6 col-xs-12">
                                    <input type="text" name="company_name" value="" placeholder=" Company Name">
                                </div>

                                <div class="form-group col-md-6 col-xs-12">
                                    <input type="text" name="email" value="" placeholder="Your Email">
                                </div>

                                <div class="form-group col-md-6 col-xs-12">
                                    <input type="text" name="phone_num" value="" placeholder="Phone Number">
                                </div>

                                <div class="form-group col-md-12 col-xs-12">
                                    <textarea name="message" rows="3" cols="3" placeholder="Message"></textarea>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-12 col-xs-12">
                                    <div class="text-right"><button type="submit"
                                            class="theme-btn btn-style-two">Send</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--COntact Form-->
                </div>
            </div>
        </div>
    </section>
@endsection
