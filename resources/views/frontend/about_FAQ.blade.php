@extends('layouts.master')
@section('content')
  
    <!-- ==========Banner Section Starts Here========== -->
    <section class="page-header bg_img" data-background="{{ asset('/public/frontend_assets')}}/images/banner/01.jpg">
        <div class="container">
            <div class="page-header-content">
                <h1 class="title">A Frequently Asked Questions (FAQ)</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        Faqs
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner Section Ends Here========== -->


    <!-- ==========Faqs Section Starts Here========== -->
    <section class="call-in-action bg_img pb-4 pt-5" data-background="{{ asset('public/frontend_assets')}}/images/bg/call-bg.jpg" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <span class="cate">Don’t Miss The Day</span>
                        <h3 class="title">A Frequently Asked Questions (FAQ)</h3>
                    </div>
                </div>
            </div>
            <div class="row mb--10">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="faq-wrapper">
                        @foreach($aboutFaqData as $item)
                        <div class="faq-item ">
                            <div class="faq-title">
                                <span class="right-icon"></span>
                                <h5 class="title">{{$item->title}}</h5>
                            </div>
                            <div class="faq-content">
                                <p class="text-justify">{!! $item->longDetails !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Faqs Section Ends Here========== -->

@endsection
