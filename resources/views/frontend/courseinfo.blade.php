@extends('layouts.master')
@section('content')
    <!-- ==========Blog Section Starts Here========== -->
    <div class="blog-section pt-5 pb-5"  style="background:rgb(208 251 255 / 61%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <article class="blog-article">
                        <div class="post-item post-classic">
                            <div class="post-thumb">
                                <h3 class="text-center mb-4"><span style="border-bottom: 2px solid black">Course Information</span></h3>
                            </div>
                            @foreach($courseInfo as $item)
                            <div class="post-content">
                                <div class="post-top">
                                    <h4 class="text-primary text-center">{{$item->title}}</h4>
                                    <p>{!!$item->shortDetails !!}</p>
                                    <p>{!!$item->longDetails !!}</p>
                                   
                                </div>
                            </div> <br>
                            @endforeach
                        </div>
                    </article>
                    
                </div>
        
            </div>
        </div>
    </div>
    <!-- ==========Blog Section Ends Here========== -->


@endsection
