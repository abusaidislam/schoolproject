@extends('layouts.master')
@section('content')
    <!-- ==========Banner Section Starts Here========== -->
    <section class="page-header bg_img" data-background="{{ asset('public/frontend_assets')}}/images/banner/page-header.jpg">
        <div class="container">
            <div class="page-header-content">
                <h1 class="title">Our Photos</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                 
                    <li>
                        Photos
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner Section Ends Here========== -->
   <!-- ==========Gallery Section Starts Here========== -->
   <div class="gallery-section pt-4 pos-rel pb-4">
    <div class="top-shape-center">
        <img src="{{ asset('public/frontend_assets')}}/css/img/gallery1.png" alt="css">
    </div>
    <div class="bottom-shape-left">
        <img src="{{ asset('public/frontend_assets')}}/css/img/bottom-shape.png" alt="css">
    </div>
    <div class="container">
        <ul class="filter-2">
            <li data-filter="*" class="active"><span class="category">Show All</span></li>
            @foreach ($albums as $album)
            <li data-filter=".{{ $album->alSlug }}"><span class="category">{{ $album->alName }}</span></li>
            @endforeach
        </ul>
        <div class="masonary-wrapper lg-three-items">
            @foreach ($ga_info as $item)
            <div class="masonary-item {{ $item->albume_slug }} programe">
                <div class="gallery-item-3">
                    <div class="gallery-thumb">
                        <a class="img-pop" href="{{ asset('public/upload/' . $item->image) }}"><img src="{{ asset('public/upload/' . $item->image) }}" alt="{{ $item->title }}"></a>
                    </div>
                    <div class="gallery-content">
                        <h5 class="title">{{ $item->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('.filter-2 li').on('click', function() {
                $('.filter-2 li').removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $('.masonary-wrapper').isotope({
                    filter: selector
                });
                return false;
            });
            $('.masonary-wrapper').isotope({
                itemSelector: '.masonary-item',
                layoutMode: 'fitRows'
            });
        });
    </script>
    
</div>
<!-- ==========Gallery Section Ends Here========== -->

@endsection
