@extends('layouts.master')
@section('content')


    <!-- ==========About Section Starts Here========== -->
    <section class="pt-4 pb-4" style="background: url('{{ asset('public/frontend_assets/css/img/lGdYRW.jpg') }}') no-repeat center center; background-size: cover;">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{ asset('public/upload/' . $aboutus->image) }}" class="img-thumbnail" alt="about">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="cate">{{$aboutus->title}}</h4> <hr>
                    <p class="text-dark" style="text-align: justify">{!! $aboutus->longDetails !!}</p> <hr> <hr>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <h4>{{$aboutceo->title}}</h4>
                           <p class="pb-4">{!! $aboutceo->longDetails !!}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <img src="{{ asset('public/upload/' . $aboutceo->image) }}" class="img-thumbnail" alt="about" height="180px" width="150px">
                        </div>
                    </div> 
                    <hr><hr>
                </div>
            </div>
        </div>
        {{-- <div class="top-shape-center">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/lGdYRW.jpg" alt="css">
        </div> --}}
        {{-- <div class="bottom-shape-left bg-light">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/Abstract-wave-liquid-shape-Fluid-design-by-DEEMKA-STUDIO-34.jpg" alt="css" style="opacity: 0.3">
        </div>
      
        <div class="pt-5">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="rtl d-none d-lg-block pr-4 ">
                            <img src="{{ asset('public/upload/' . $aboutus->image) }}" class="img-thumbnail" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="about-content">
                            <div class="section-header left-style mb-olpo">
                                <h3 class="cate">{{$aboutus->title}}</h3>
                                <p class="text-dark" style="text-align: justify">{!! $aboutus->longDetails !!}</p>
                            </div>
                            <div class="faq-wrapper mb--10">
                              
                                <div class="faq-item active open">
                                    <div class="faq-content">
                                        <img src="{{ asset('public/upload/' . $aboutceo->image) }}" class="img-thumbnail" alt="about">
                                    </div>
                                </div>
                              

                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
        </div> --}}
    </section>
    <!-- ==========About Section Ends Here========== -->



@endsection
