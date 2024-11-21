@extends('layouts.master')
@section('content')
    <!-- ==========About Section Starts Here========== -->
    <section class="about-section pos-rel p-5" style="background:rgb(208 251 255 / 61%);" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h3 class="title">Our 
                            Calendar of Events</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($traningInfo as $index => $item)
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  ">
                        <div class="feature-item" style="text-align: left">
                            <div class="row ">
                            <div class="col-md-2">
                                <img src="{{ asset('public/frontend_assets/images/about/location.gif')}}" alt="contact" width="80" height="80">
                            </div>
                            <div class="col-md-10">
                                <h6 class="mb-1">{{$item->title}}</h6>
                                <p>{!! $item->longDetails !!}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
     
    </section>
    <!-- ==========About Section Ends Here========== -->

    <!-- ==========Faqs Section Ends Here========== -->

@endsection
