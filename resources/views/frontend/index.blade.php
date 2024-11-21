@extends('layouts.master')
@section('content') 
   <!-- ==========Banner Section Starts Here========== -->
   <section class="banner-section style-slide">
    <div class="banner-slider">
        @foreach ($slide as $item)
        <div class="banner-item bg_img"
            data-background="{{ asset('public/upload/' . $item->image) }}">
            <div class="banner-item-inner">
                <div class="container">
                    <div class="banner-item-wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-item-content text-center">
                                    {{-- <h3 style="background-color: #E01A1F; color:white; padding:4px;">{{ $item->title }}</h3> --}}
                                    <p></p>
                                    <a href="#" class="custom-button"><span></span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

  
<!-- ==========Banner Section Ends Here========== -->

    <!-- ==========Welcome Section Starts Here========== -->
    <section class="teacher-section padding-top padding-bottom pos-rel " style="background:rgb(208 251 255 / 61%);">
        <div class="top-shape-center">
            <img src="{{ asset('public/frontend_assets/css/img/gallery1.png')}}" alt="css">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h3 class="title">Welcome to Abacus Math Bangladesh</h3>
                        <span class=""> Abacus approach promotes whole brain development and establishes foundational building blocks like memory, concentration, creativity and problem solving – core skills that inspire greater confidence and success in all subject areas and in life.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach($abacusInfo as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="teacher-item-2 cardhover">
                        <div class="teacher-thumb">
                            <div class="thumb">
                                <a href="">
                                    <img src="{{ asset('public/upload/' . $item->image) }}" alt="teacher" >
                                </a>
                            </div>
                            <div class="content" style="min-height: 210px">
                                <h5 class="title"><a href="">{{$item->title}}</a></h5>
                                <p style="text-align: justify">{!!$item->longDetails!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- ==========Welcome Section Ends Here========== -->


    <!-- ==========About Section Starts Here========== -->
    <section class="about-section pos-rel padding-bottom">
        <div class="top-shape-center">
            <img src="{{ asset('public/frontend_assets/css/img/gallery1.png') }}" alt="css">
        </div>
        <div class="padding-top about-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb" >
                            <img src="{{ asset('public/upload/' . $aboutAbacus->image) }}"  class="img-thumbnail" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header left-style mb-olpo">
                                <h3 class="cate">{{$aboutAbacus->title??''}}</h3> <hr>
                                <p style="text-align: justify">
                                    @php
                                        // Strip HTML tags
                                        $strippedText = strip_tags($aboutAbacus->longDetails);
                                        
                                        // Truncate the text to 150 characters and add '...' if it's longer
                                        if (strlen($strippedText) > 988) {
                                            $truncatedText = substr($strippedText, 0, 988) . '.....';
                                        } else {
                                            $truncatedText = $strippedText;
                                        }
                                    @endphp
                                
                                    {!! $truncatedText !!}
                                </p>
                                
                                <a href="{{url('1/abacus-overview')}}">Read More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========About Section Ends Here========== -->


    <!-- ==========Counter Section Starts Here========== -->
    <div class="counter-section padding-top padding-bottom bg_img"
        data-background="{{ asset('public/frontend_assets/images/counter/counter-bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="counter-item round-style">
                        <div class="counter-thumb">
                            <img src="{{ asset('public/upload/' . $successlist1->image) }}" alt="success image">
                        </div>
                        <div class="counter-content">
                            <div class="counter-header">
                                <h2 class="title odometer" data-odometer-final="{!!$successlist1->longDetails!!} ">0</h2>
                                <h2 class="title">+</h2>
                            </div>
                            
                            <span class="cate">{{$successlist1->title}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="counter-item round-style">
                        <div class="counter-thumb">
                            <img src="{{ asset('public/upload/' . $successlist2->image) }}" alt="counter">
                        </div>
                        <div class="counter-content">
                            <div class="counter-header">
                                <h2 class="title odometer" data-odometer-final="{!!$successlist2->longDetails!!} ">0</h2>
                                <h2 class="title">+</h2>
                            </div>
                            <span class="cate">{{$successlist2->title}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="counter-item round-style">
                        <div class="counter-thumb">
                            <img src="{{ asset('public/upload/' . $successlist3->image) }}" alt="counter">
                        </div>
                        <div class="counter-content">
                            <div class="counter-header">
                                <h2 class="title odometer" data-odometer-final="{!!$successlist3->longDetails!!} ">0</h2>
                                <h2 class="title">+</h2>
                            </div>
                            <span class="cate">{{$successlist3->title}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="counter-item round-style">
                        <div class="counter-thumb">
                            <img src="{{ asset('public/upload/' . $successlist4->image) }}" alt="counter">
                        </div>
                        <div class="counter-content">
                            <div class="counter-header">
                                <h2 class="title odometer" data-odometer-final="{!!$successlist4->longDetails!!}">0</h2>
                                <h2 class="title">K+</h2>
                            </div>
                            <span class="cate">{{$successlist4->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Counter Section Ends Here========== -->


    <!-- ==========Class Section Starts Here========== -->
  
    <!-- ==========Class Section Ends Here========== -->

    <section class="call-in-action bg_img pb-4 pt-5" data-background="{{ asset('public/frontend_assets')}}/images/bg/call-bg.jpg" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header text-white">
                        <h3 class="title pb-2"><span style="border-bottom: 2px solid black">Benefits Of This Program</span> </h3>
                        <span class="">It’s a unique child development program. Learners of Abacus Math Bangladesh lay a solid foundation helping children to reach their full potential and gradually become better at:</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($empowering as $item)
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="call-wrapper hovereffect" style="padding: 40px 30px">
                        <div class="text-center mb-4">
                            <img src="{{ asset('public/upload/' . $item->image) }}" height="100" width="150" alt="{{$item->title}}" class="rounded">
                        </div>
                        <div class="section-header mb-olpo mb-0" style="min-height: 210px">
                            <h4 class="title"><span style="border-bottom:2px solid black">{{$item->title}}</span></h3>
                            <p style="text-align: justify">{!!$item->longDetails!!}</p>
                        </div>
                        
                    </div>
                </div>
                @endforeach
                
            </div>
           
        </div>
    </section>


    <!-- ==========Teacher Section Starts Here========== -->
    <section class="teacher-section padding-bottom padding-top bg_img"
        data-background="{{ asset('public/frontend_assets/images/teacher/teacher-bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h3 class="title">Our CI ( Course Instructor )</h3>
                        <span class="cate">We Have An Excellent Teacher To Child Ratio At Our Kindergarten To Ensure That Each Child Receives The Attention He Or She Needs.
                            </span>
                    </div>
                </div>
            </div>
            <div class="row mb-30-none justify-content-center">
                @foreach($teacherList as $item)
                <div class="col-lg-6">
                    <div class="teacher-item">
                        <div class="teacher-inner">
                            <div class="teacher-thumb">
                                <div class="thumb-inner">
                                    <a href="{{ url('profile-view/' . $item->id) }}"><img
                                            src="{{ asset('public/upload/' . $item->image) }}"
                                            alt="teacher" height="170px" width="150px"></a>
                                </div>
                            </div>
                            <div class="teacher-content">
                                <h6 class="title"><a href="{{ asset('public/upload/' . $item->image) }}">{{$item->teachername}}</a></h6>
                                <span class="info">{{$item->eduqualification}}</span>
                                <p>{{$item->presentaddress}}</p>
                                <ul class="teacher-social">
                                    <li>
                                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="vimeo"><i class="fab fa-vimeo-v"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="behance"><i class="fab fa-behance"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>
    <!-- ==========Teacher Section Ends Here========== -->

    <!-- ==========Schedule Section Starts Here========== -->
    <section class="schedule-section padding-top padding-bottom" style="background:white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h3 class="title pb-4"><span style="border-bottom: 2px solid black">Magical Functions</span> </h3>
                        <span class="cate">{{$magicalImage->title}}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front" style="text-align: center">
                        <img src="{{ asset('public/upload/' . $magicalImage->image) }}" alt="magical image" style="width:90%;height:500px;">
                        </div>
                        <div class="flip-card-back " style="height:500px;">
                        <div class="row">
                            <div class="col-md-2 col-sm-12"></div>
                            <div class="col-md-10 col-sm-12">
                                <p>{!!$magicalImage->longDetails!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Schedule Section Ends Here========== -->


    <!-- ==========Client Section Ends Here========== -->

    <div class="gallery-section mt-5 padding-bottom pos-rel">
        <div class="top-shape-center">
            <img src="{{ asset('public/frontend_assets')}}/css/img/gallery1.png" alt="css">
        </div>
        <div class="bottom-shape-left">
            <img src="{{ asset('public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
        </div>
        {{-- <h3 class="title text-center mb-4"><span style="border-bottom: 1px solid black">Our Videos</span></h1> --}}
        <div class="container">
        
            <style>
                @media (max-width: 768px) {
                            iframe {
                                width: 100%;
                            }
                      }
                </style>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header">
                            {{-- <span class="cate">Meet Our Stuffy</span> --}}
                            <h3 class="title">Our Best Videos</h3>
                        </div>
                    </div>
                </div>
        <section class="gallery-section">
          
            <div class="auto-container">
                <div class="images-container">
                    <div class="items-container row clearfix">
                        @foreach ($video as $item)
                            <div class="column all eco plants col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                                <div class="default-portfolio-item">
                                    <div class="inner-box text-center">
                                        <div class="video-box">
                                           
                                            <iframe class="embed-responsive-item" width="550" height="380"
                                            src="{{ 'https://www.youtube.com/embed/' . $item->vcode }}"
                                            title="{{ $item->title }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen>
                                        </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
            
        </div>
    </div>
@endsection
