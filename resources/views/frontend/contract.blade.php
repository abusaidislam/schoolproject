   
   @extends('layouts.master')
   @section('content')
   <!-- ==========Banner Section Starts Here========== -->
   <section class="page-header bg_img" data-background="{{ asset('public/frontend_assets/images/banner/contractus.jpg')}}">
    <div class="container">
        <div class="page-header-content">
          
        </div>
    </div>
</section>
<!-- ==========Banner Section Ends Here========== -->


<!-- ==========Contact Section Starts Here========== -->
<section class="contact-section padding-top padding-bottom">
    <div class="container">
        <div class="contact-form-area">
            
            <h4 class="title">Send A Message</h4>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
             <form  class="contact-form" method="POST" action="{{ url('/contactus') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Your Name" id="name" name="name" value="{{old(('name'))}}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Your Email" id="email" name="email" value="{{old(('email'))}}" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror
                </div>
                <div class="form-group">
                    <input type="number" placeholder="Phone" id="phone" value="{{old(('phone'))}}" name="phone" required>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Subject" id="subject" value="{{old(('subject'))}}" name="subject">
                    @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group w-100">
                    <textarea name="message" id="message" id="message" placeholder="Your Message" required></textarea>
                </div>
                <div class="form-group w-100 text-center">
                    <button class="custom-button" type="submit"><span>Send Message</span></button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- ==========Contact Section Ends Here========== -->


<!-- ==========Map Section Starts Here========== -->


<div class="map-section pos-rel">
    <div class="maps" style="position: relative; overflow: hidden;">
        <!-- Your map content goes here -->
        <div class="gmap_canvas" style="position: relative; overflow: hidden; height: 100%; width: 100%;">
            <iframe src="<?php echo $BasicInfo->google; ?>" frameborder="0" scrolling="no" style="width: 100%; height: 100%;"></iframe>
            <style>
                .mapouter {
                    position: relative;
                    height: 100%;
                    width: 100%;
                    background: #fff;
                }
            </style>
            <a href="" style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ircc login</a>
            <style>
                .gmap_canvas {
                    overflow: hidden;
                    height: 100%;
                    width: 100%;
                    position: relative; /* Add this line */
                    z-index: 1; /* Add this line */
                }

                .gmap_canvas iframe {
                    position: relative;
                    z-index: 2;
                    width: 100%;
                    height: 100%;
                }
            </style>
        </div>
      
    </div>
  
</div>



<!-- ==========Map Section Ends Here========== -->
@endsection