<!-- ==========Footer Section Starts Here========== -->


<div class="row " style=" background-color: #f1f6ff;">
    <div class="section-header pt-5">
        <span class="cate">Testimonials</span>
        <h3 class="title">Let's explore what Parents have to say about us.</h3> 
    </div>
    <style>
        .mfp-content .mfp-title {
        line-height: 1.5;  /* Set line height to 1.5 */
        text-align: justify;
    }
    </style>
    <div class="owl-carousel owl-theme pb-3">
        @php
        $testimonial = DB::table('homepage_manages')->where('content_type', '=', 10)->orderBy('id', 'desc')->get();
        @endphp
        @foreach($testimonial as $item)
        <div class="item">
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider">
                        <div class="post-slide">
                            <div class="post-img gallery-thumb">
                                <a class="img-pop" href="{{ asset('public/upload/' . $item->image) }}" data-title="{{ $item->longDetails }}">
                                    <img src="{{ asset('public/upload/' . $item->image) }}" alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">{{ $item->title }}</a>
                                </h3>
                                <p style="post-description; text-align:justify">
                                    @php
                                    $strippedText = strip_tags($item->longDetails);
                                    if (strlen($strippedText) > 55) {
                                        $truncatedText = substr($strippedText, 0, 50) . '.....';
                                    } else {
                                        $truncatedText = $strippedText;
                                    }
                                    @endphp
                                    {!! $truncatedText !!}
                                </p>
                                @php
                                $date = \Carbon\Carbon::parse($item->created_at);
                                $formattedDate = $date->format('M d, Y');
                                $formattedDate = str_replace('Oct', 'Out', $formattedDate);
                                @endphp
                                <span class="post-date">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $formattedDate }}
                                </span>
                                <a href="{{ asset('public/upload/' . $item->image) }}" class="read-more img-pop" data-title="{{ $item->longDetails }}">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Modal structure for Magnific Popup -->
    <div id="test-modal" class="mfp-hide">
        <img id="modalImage" src="" alt="Image" class="img-fluid mb-3">
        <p id="modalDetails"></p>
    </div>
</div>
    

<footer class="bg_img" data-background="{{ asset('public/frontend_assets/images/footer/footer-bg.jpg')}}">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4 mb--50">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget widget-about">
                        <h5 class="title">{{ $basicInfo->title }}</h5>
                        <img src="{{ asset('public/upload/' . $basicInfo->favIcon) }}" height="100px" alt="logo">
                       <p class="p-2" style="text-align: justify">{{$basicInfo->message}}</p>
                       <button class="btn btn-info" style="width: 300px"><a href="{{url('/3/centre-list')}}" class="text-dark">Find My Nearest Center</a></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget widget-blog">
                        <h5 class="title">Quick Links</h5>
                        <ul>
                            <li><a href="{{url('/')}}">Home Page</a></li>
                            <li><a href="{{url('/1/abacus-overview')}}">Abacus Overview</a></li>
                            <li><a href="{{url('3/admission-and-tuition-fee')}}">Admission Fee</a></li>
                            <li><a href="{{url('3/centre-list')}}">Our Centers</a></li>
                            <li><a href="{{url('/5/photos')}}">Photos</a></li>
                            <li><a href="{{url('/contact-us')}}">Contract Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget widget-about">
                        <h5 class="title">Contact Us</h5>
                      
                        <ul class="contact">
                            <li><i class="fas fa-home"></i>{{ $basicInfo->address }}</li>
                            <li><i class="fas fa-headphones-alt"></i><a href="Tel:54154654">{{ $basicInfo->mobile }}</a></li>
                            <li><i class="fas fa-globe-asia"></i><a href="{{url('/')}}">{{ $basicInfo->email }} </a></li>
                        </ul>
                        <ul class="social-icons">
                            <li>
                                <a href="{{ $basicInfo->fbLink }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="{{ $basicInfo->instraLink }}" class="instagram"><i class="fab fa-instagram"></i></a>
                            </li>
                           
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-lg-4 col-md-6 pl-xl-4">
                    <div class="footer-widget widgt-form">
                        <h5 class="title">Sign up for open day</h5>
                        <p>Enter your email and get latest updates and offers subscribe us</p>
                        <form class="footer-form">
                            <input type="text" placeholder="Enter your email" name="email">
                            <button type="submit">
                                <span class="shape"></span>
                                <span><i class="flaticon-vegan"></i> Subscribe Now!</span>
                            </button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright text-center">
                Copyright &copy; {{ date('Y') }}
                <a href="{{ url('/') }}" style="color: #E01A1F;">{{ $basicInfo->title }}</a> 
                All rights reserved
            </p>
        </div>
    </div>
</footer>
<!-- ==========Footer Section Ends Here========== -->
