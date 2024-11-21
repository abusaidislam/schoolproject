@extends('layouts.master')
@section('content')


    <!-- ==========About Section Starts Here========== -->
    <section class="about-section pos-rel padding-bottom pt-5 ">
        <div class="top-shape-center">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/gallery1.png" alt="css">
        </div>
        <div class="bottom-shape-left">
            <img src="{{ asset('/public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h3 class="title">Categories With Admission Fee And Tuition Fee For Physical Centre</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none -mx-10">
              @foreach($feeStructure as $item)
                <div class="col-md-12 col-lg-12 col-xl-12 rounded">
                    <div class="feature-item" style="background: rgb(222, 239, 243)">
                        <div class="bg-info">
                            <h4 class="title p-2"><span style="border-bottom: 2px solid black">{{$item->title}}</span></h4>
                            <p class="p-2 text-center">{!! $item->shortDetails !!}</p>
                        </div>
                        <div class="feature-content" >
                            <p class="text-center">{!! $item->longDetails !!}</p>
                        </div><br>
                        <div> 
                            <a href="{{url('3/centre-list')}}" class=""><span class="btn btn-sm bg-success p-3 text-white">All Centre</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
     
            </div>
        </div>
       
    </section>
    <!-- ==========About Section Ends Here========== -->



@endsection
