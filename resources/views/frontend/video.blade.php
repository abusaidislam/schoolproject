@extends('layouts.master')
@section('content')
<style>
    @media (max-width: 768px) {
                iframe {
                    width: 100%;
                }
          }
    </style>
<!-- ==========Gallery Section Starts Here========== -->
<div class="gallery-section mt-5 padding-bottom pos-rel">
    <div class="top-shape-center">
        <img src="{{ asset('public/frontend_assets')}}/css/img/gallery1.png" alt="css">
    </div>
    <div class="bottom-shape-left">
        <img src="{{ asset('public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
    </div>
    <h3 class="title text-center mb-4"><span style="border-bottom: 1px solid black">Our Videos</span></h1>
    <div class="container">
    

    <section class="gallery-section">
      
        <div class="auto-container">
            <div class="images-container">
                <div class="items-container row clearfix">
                    @foreach ($video as $item)
                        <div class="column all eco plants col-md-4 col-sm-6 col-xs-12">
                            <div class="default-portfolio-item">
                                <div class="inner-box text-center">
                                    <div class="video-box">
                                       
                                        <iframe class="embed-responsive-item" width="380" height="280"
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
<!-- ==========Gallery Section Ends Here========== -->
  
@endsection
