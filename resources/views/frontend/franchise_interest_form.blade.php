@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
            <div style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
               <div class="row">
              
               </div>
                <form id="add-user-form" action="{{ url('franchise-data-store/') }}" method="POST" enctype="multipart/form-data"
                    style="width: 90%;  margin-left : 5%; margin-top : 2%">
                    @csrf
                    <div style="margin: 0 auto" class="bg-info p-3">
                        <h4 class="text-center"><span style="border-bottom: 2px solid black">{{$franchiseInfo->title}}</span></h4>
                        <p>{!!$franchiseInfo->longDetails !!}</p>
                    </div>
                    <div class="row justify-content-center pt-5">
                        <div>
                            <h4 style="text-align: center; padding-bottom:10px;text-decoration: underline; color:green">
                                Franchise Interest Form</h4>
                        </div>
      
                        <div class="col-sm-12 col-md-8 col-lg-8 ">
                            <div class="form-group  mb-3 p-0">
                                <div>
                                    <label for="name">What is your name?<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="name"
                                        name="name" placeholder=" Enter Your Name" value="{{old(('name'))}}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="gender">Your Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender"  class="form-select" value="{{old(('gender'))}}" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no" value="{{old(('mobile_no'))}}" placeholder="Mobile Number" required>
                                    <span id="mobileError" class="text-danger"></span>
                                    @error('mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old(('email'))}}" placeholder="Email Address" required>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="center">Your preferred location to Abacus Math Bangladesh Center                                        <span class="text-danger">*</span></label>
                                    @foreach ($Center as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="center" name="center[]" value="{{$item->title}}">
                                            <label class="form-check-label">{{$item->title}}</label>
                                        
                                        </div>
                                    @endforeach 
                                    @error('center')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="outside_dist">If outside Dhaka, then mention District Name</label>
                                    <input type="text" class="form-control" id="outside_dist" name="outside_dist" value="{{old(('outside_dist'))}}" placeholder="Enter District Name">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="interested">Which Franchise Model You are Interested in? <span class="text-danger">*</span></label>
                                    @foreach ($Interested as $item)
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="interested" name="interested" value="{{$item->title}}" checked>
                                        <label class="form-check-label" for="interested">{{$item->title}}</label>
                                      </div>
                                      @endforeach 
                                      @error('interested')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="about_us">How did you know about us?<span class="text-danger">*</span></label>
                                    @foreach ($AboutUs as $item)
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="about_us" name="about_us" value="{{$item->title}}" checked>
                                        <label class="form-check-label" for="about_us">{{$item->title}}</label>
                                      </div>
                                      @endforeach 
                                      @error('about_us')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>
                        </div><br>
                        <button type="submit" style="width: 400px; text-align:center; margin: 0 auto !important;" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
        $('#mobile_no').on('input', function() {
            var mobileNumber = $(this).val();
            var mobileError = $('#mobileError');
            if (mobileNumber.length !== 11 || isNaN(mobileNumber)) {
                mobileError.text('Mobile number must be 11 digits');
            } else {
                mobileError.text('');
            }
        });
    });
   
</script>
