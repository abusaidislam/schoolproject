@extends('layouts.master')
@section('content')
    <!-- ==========Banner Section Starts Here========== -->
    <section class="page-header bg_img" data-background="{{ asset('public/frontend_assets')}}/images/banner/abacus2.jpg">
        <div class="container">
            <div class="page-header-content">
                <h1 class="title text-white">Competition</h1>
                <ul class="breadcrumb ">
                    <li > 
                        <a class="text-white" href="{{url('/')}}">Home</a>
                    </li>
                 
                    <li class="text-white">
                        Competition
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner Section Ends Here========== -->
    <section class="about-section pos-rel padding-bottom oh">
        <div class="top-shape-center">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/gallery1.png" alt="css">
        </div>
        <div class="bottom-shape-left">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
        </div>
     
        <div class="padding-top ">
            <div class="container">
                @foreach($competition as $item)
                <div class="row">               
                    <div class="col-lg-6">
                        <h4 class="title">{{$item->title}}</h3><hr>
                        <div class="about-content">
                            <div class="section-header left-style mb-olpo">
                                <p style="text-align: justify">{!! $item->longDetails !!}</p>
                            </div>
                       
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container">
             
                <div class="masonary-wrapper lg-three-items">
                    @foreach ($ga_info as $item)
                  
                    <div class="masonary-item toddler programe">
                        <div class="gallery-item-3">
                            <div class="gallery-thumb">
                                <a class="img-pop" href="{{ asset('public/upload/' . $item->image) }}"><img
                                        src="{{ asset('public/upload/' . $item->image) }}" alt="{{ $item->title }}"></a>
                            </div>
                            <div class="gallery-content">
                                <h5 class="title">{{ $item->title }}</h5>
                                {{-- <span>Financial | Human</span> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
            
            </div>
        </div>
    </section>
@endsection
