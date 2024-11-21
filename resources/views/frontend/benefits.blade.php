@extends('layouts.master')
@section('content')


    <!-- ==========About Section Starts Here========== -->
    <section class="about-section pos-rel padding-bottom oh">
        <div class="top-shape-center">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/gallery1.png" alt="css">
        </div>
        <div class="bottom-shape-left">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
        </div>
     
        <div class="padding-top ">
            <div class="container">
                @foreach($karzabli as $item)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header">
                            <span class="cate">Franchising Benefits</span>
                            <h4 class="title">{{$item->title}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                 
                    <div class="col-lg-6">
                        <div class="rtl d-none d-lg-block pr-4 ">
                            <img src="{{ asset('public/upload/' . $item->image) }}" class="img-thumbnail" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="about-content">
                            <div class="section-header left-style mb-olpo">
                              
                                <p>{!! $item->longDetails !!}</p>
                            </div>
                           
                            <button class="btn btn-info" style="width: 40%"><a href="{{url('3/franchise-interest-form')}}" class="text-dark">Franchise Interest Form </a></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ==========About Section Ends Here========== -->



@endsection
