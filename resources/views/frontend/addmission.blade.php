@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
            <div
                style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
                <form id="add-user-form" action="{{ url('studant_stor/') }}" method="POST" enctype="multipart/form-data"
                    style="width: 90%;  margin-left : 5%; margin-top : 2%">
                    @csrf
                    <div class="row">
                       <br>
                        <div>
                            <h4 style="text-align: center; padding-bottom:10px;text-decoration: underline; color:green">
                                Online Addmission Form</h4>
                        </div>
                        @php
                            $corporateText = DB::table('homepage_manages')->where('content_type', 16)->orderBy('id','asc')->first();
                        @endphp
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group mb-4">
                                <div>
                                    <label for="online_corporate">Online Corporate <span class="text-danger">*</span> </label>
                                    <select name="online_corporate" id="online_corporate"  class="form-select">
                                        <option value="0" selected>Corporate Virtual Branch (Full Course by Zoom online)</option>
                                    </select>
                                    <span style="font-size: 12px; text-align:justify">{!! $corporateText->longDetails?? '' !!}</span>
                                </div>
                            </div>
                            <div class="form-group  mb-4">
                                <div>
                                    <label for="student_fullName">Student's Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="student_fullName"
                                        name="student_fullName" placeholder=" Enter Student's Full Name" value="{{old(('student_fullName'))}}"  required>
                                        @error('student_fullName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="gender">Gender<span class="text-danger">*</span></label>
                                    <select name="gender" id="gender"  class="form-select" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="father_name">Father's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="father_name" value="{{old(('father_name'))}}" 
                                        name="father_name" placeholder="* Father's Name" required> 
                                        
                                        @error('father_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
      
                            <div class="form-group mb-4">
                                <div>
                                    <label for="father_occupation">Father's Occupation ( পিতার পেশা ) <span class="text-danger">*</span></label>
                                    <textarea name="father_occupation" id="father_occupation" class="form-control" required style="height: 100px"
                                        placeholder="Father's Occupation" rows="2"></textarea>
                                        <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                        @error('father_occupation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="father_contactno">Father's Mobile Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="father_contactno" name="father_contactno" value="{{old(('father_contactno'))}}"
                                        placeholder="Father's Mobile Number" tabindex="9" required>
                                        <span id="fathercontactError" class="text-danger"></span>
                                        @error('father_contactno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="mother_name">Mother's  Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="mother_name"  value="{{old(('mother_name'))}}"
                                        name="mother_name" placeholder=" Mother's  Name" tabindex="5" required>
                                        @error('mother_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
      
                            <div class="form-group mb-4">
                                <div>
                                    <label for="mather_occupation">Mother's  Occupation ( মাতার পেশা ) <span class="text-danger">*</span></label>
                                    <textarea name="mather_occupation" id="mather_occupation" class="form-control" style="height: 100px"
                                        placeholder="Mother's  Occupation" rows="2"></textarea>
                                        <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                        @error('mather_occupation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="mather_contactno">Mother's  Mobile Number <span class="text-danger">*</span></label>
                                    <input type="phoneno" class="form-control" id="mather_contactno" name="mather_contactno"  value="{{old(('mather_contactno'))}}"
                                        placeholder="Mother's  Mobile Number" tabindex="9" required>
                                        <span id="mothercontactError" class="text-danger"></span>
                                        @error('mather_contactno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="contactno">Contact Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contactno" name="contactno"  value="{{old(('contactno'))}}"
                                        placeholder=" Contact Number" tabindex="9" required>
                                        <span id="mobileError" class="text-danger"></span>
                                        @error('contactno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="dateofbirth"> Date Of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old(('dateofbirth'))}}"
                                        required>
                                        @error('dateofbirth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            {{-- <div class="form-group">
                                <div>
                                    <div style="font-weight:bold;">* Upload file</div>
                                    <label class="mpbtn col-md-3" style="cursor:pointer"><br>
                                        <img id="imageID" style="max-width:100%" class="img-thumbnail"
                                            src="{{ asset('public/assets/no_image.jpg') }}">
                                        <input id="inputID" name="image" style="display:none"
                                            onchange="imageLoader(this);" type="file" accept="image/*">
                                    </label><br><br><br>
                                </div>
                            </div><br><br> --}}
                           
                            <div class="form-group mb-4">
                                <div>
                                    <label for="school_enrolled">Name of School currently enrolled ( যে স্কুলে পড়ে তার নাম লিখুন)  <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" style="width: 100%" id="school_enrolled" value="{{old(('school_enrolled'))}}"
                                        name="school_enrolled" placeholder="Enter School Name" required>
                                        <p style="text-align: justify; font-size:12px">TIf not attended in school then write NA.</p>
                                        @error('school_enrolled')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                             </div>
                         
                            <div class="form-group mb-4">
                                <div>
                                    <label for="present_address">Present Address ( বর্তমান ঠিকানা ) <span class="text-danger">*</span></label>
                                    <textarea name="present_address" id="present_address" class="form-control" tabindex="14" 
                                        placeholder="Present Address"></textarea>
                                        @error('present_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="course">Select the Course <span class="text-danger">*</span></label>
                                    <select id="course" name="course"  class="form-select" tabindex="10" required>
                                        <option value="">Select the Course</option>
                                        <option value="Senior Course">Senior Course</option>
                                        <option value="Junior Course">Junior Course</option>
                                    </select>
                                    <p style="text-align: justify; font-size:12px">Please note that only enrolled students can participate in our online Live Zoom Class.</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="language">Select Your Preferred Language For Class Lecture <span class="text-danger">*</span></label>
                                    <select id="language" name="language"  class="form-select" tabindex="10" required>
                                        <option value="">Select From Dropdown</option>
                                        <option value="bengali">Bengali</option>
                                        <option value="english">English</option>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="appropriate_answer">Click on Appropriate Answer  <span class="text-danger">*</span> </label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="appropriate_answer" value="New Student" >I am applying for Senior Course as a New Student
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="appropriate_answer" value="Senior Course">I have completed Junior Course and want to start Senior Course
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio3" name="appropriate_answer" value="Junior Course">Not applicable because I want to start Junior Course
                                    <label class="form-check-label" for="radio3"></label>
                                </div>
                                @error('appropriate_answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                    <input type="email" class="form-control" placeholder="Enter Email Address" id="email" value="{{old(('email'))}}"
                                        name="email"required>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="form-group mb-4">
                                <label for="about">From which source you know about Abacus Math Bangladesh? (নিচের যে কোন একটি বক্সে ক্লিক করুন) <span class="text-danger">*</span> </label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="about" value="Google" >Google
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="about" value="Facebook">Facebook
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio3" name="about" value="Relatives and Friends">Relatives and Friends
                                        <label class="form-check-label" for="radio3"></label>
                                    </div>
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              
                            <div class="form-group mb-4">
                                @php
                                    $paymentText = DB::table('homepage_manages')->where('content_type', 16)->orderBy('id','desc')->first();
                                @endphp
                                <label for="payment">{{$paymentText->title ??'Corporate Number for Payment'}} (নিচের বাম পাশের বক্সে ক্লিক করুন) <span class="text-danger">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="payment" name="payment" value="Payment Yes" >
                                    <label class="form-check-label">{!! $paymentText->longDetails ?? '' !!} </label>
                                  </div>
                                  @error('payment')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              </div>
                            <div class="form-group mb-4">
                                <label for="condition_name">Checkboxes (নিচের বাম পাশের বক্সে ক্লিক করুন)<span class="text-danger">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="condition_name" value="1" >
                                    <label class="form-check-label">I have accepted all terms and conditions and privacy policy.</label>
                                  </div>
                                  @error('condition_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                            
                            
                        </div>
                        <button type="submit" style="width: 400px; text-align:center; margin: 0 auto !important;" class="btn btn-primary">Submit (এখানে ক্লিক করে সাবমিট করুন)</button>

                </form>
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
    function validateMobileNumber(inputId, errorId) {
        $(inputId).on('input', function() {
            var mobileNumber = $(this).val();
            var mobileError = $(errorId);
            if (mobileNumber.length !== 11 || isNaN(mobileNumber)) {
                mobileError.text('Mobile number must be 11 digits');
            } else {
                mobileError.text('');
            }
        });
    }

    validateMobileNumber('#contactno', '#mobileError');
    validateMobileNumber('#father_contactno', '#fathercontactError');
    validateMobileNumber('#mather_contactno', '#mothercontactError');
});

</script>

