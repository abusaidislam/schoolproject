@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
           
            <div style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
               <div class="row">
              
               </div>
            
                <form id="add-user-form" action="{{ url('competition-registration/') }}" method="POST" enctype="multipart/form-data"
                    style="width: 90%;  margin-left : 5%; margin-top : 2%">
                    @csrf
                    <div style="margin: 0 auto" class="bg-info p-3">
                        {{-- <h4 class="text-center"><span style="border-bottom: 2px solid black">{{$franchiseInfo->title}}</span></h4> --}}
                        {{-- <p>{!!$franchiseInfo->longDetails !!}</p> --}}
                        <img src="{{asset('public/upload/'. $competitionText->image ?? '')}}" alt="" srcset="" width="100%">
                    </div>
                    <div class="row justify-content-center pt-5">
                        <div class="row">
                            <br>
                             <div>
                                 <h4 style="text-align: center; padding-bottom:10px;text-decoration: underline; color:green">
                                    Competition Registration Form</h4>
                             </div>
                             @php
                                 $corporateText = DB::table('homepage_manages')->where('content_type', 16)->orderBy('id','asc')->first();
                             @endphp
                             <div class="col-sm-12 col-md-6 col-lg-6">
                                 {{-- <div class="form-group mb-4">
                                     <div>
                                         <label for="online_corporate">Online Corporate <span class="text-danger">*</span> </label>
                                         <select name="online_corporate" id="online_corporate"  class="form-select">
                                             <option value="0" selected>Corporate Virtual Branch (Full Course by Zoom online)</option>
                                         </select>
                                         <span style="font-size: 12px; text-align:justify">{!! $corporateText->longDetails?? '' !!}</span>
                                     </div>
                                 </div> --}}
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
                                        <label for="present_address">Present Address ( বর্তমান ঠিকানা ) <span class="text-danger">*</span></label>
                                        <textarea name="present_address" id="present_address"  rows="2" class="form-control" tabindex="5" 
                                            placeholder="Present Address"></textarea>
                                            @error('present_address')
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
                                        <label for="class_name">Select Class Name<span class="text-danger">*</span></label>
                                        <select id="class_name" name="class_name" class="form-select" tabindex="10" required>
                                            <option value="" disabled selected>Select Class Name</option>
                                            <option value="Junior One">Junior One</option>
                                            <option value="One">One</option>
                                            <option value="Two">Two</option>
                                            <option value="Three">Three</option>
                                            <option value="Four">Four</option>
                                            <option value="Five">Five</option>
                                            <option value="Six">Six</option>
                                            <option value="Seven">Seven</option>
                                            <option value="Eight">Eight</option>
                                            <option value="Nine">Nine</option>
                                            <option value="Ten">Ten</option>
                                            <option value="Eleven">Eleven</option>
                                            <option value="Twelve">Twelve</option>
                                        </select>
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
                                <div class="form-group mb-4">
                                    <div>
                                        <label for="phone_number">Login Phone Number <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="phone_number" name="phone_number"  value="{{old(('phone_number'))}}"
                                            placeholder="Phone Number" tabindex="9" required>
                                            <span id="mobileError" class="text-danger"></span>
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                 <div class="form-group mb-4">
                                     <div>
                                         <label for="password">Password <span class="text-danger">*</span> </label>
                                         <input type="password" class="form-control" placeholder="Enter Password" id="password" value="{{old(('password'))}}"
                                             name="password"required>
                                             @error('password')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>  
                                 <div class="form-group mb-4">
                                    <div>
                                        <label for="student_type">Select Student Type:<span class="text-danger">*</span></label>
                                        <select id="student_type" name="student_type" class="form-select" tabindex="10" required>
                                            <option value="" disabled selected>Select Student Type</option>
                                            <option value="Yes">Abacus Math Bangladesh Student</option>
                                            <option value="No">Non-Abacus Math Bangladesh Student</option>
                                        </select>
                                        {{-- <p style="text-align: justify; font-size:12px">Please note that only enrolled students can participate in our online Live Zoom Class.</p> --}}
                                    </div>
                                </div>

                                <!-- Hidden Select Level Form -->
                                <div id="select_level_form" class="form-group mb-4" style="display: none;">
                                    <div>
                                        <label for="level_name">Select Level<span class="text-danger">*</span></label>
                                        <select id="level_name" name="level_name" class="form-select" tabindex="10" required>
                                            <option value="" disabled selected>Select Level</option>
                                            <option value="1">Special Category A1</option>
                                            <option value="2">Special Category A2</option>
                                            <option value="3">Category B1 Level 1</option>
                                            <option value="4">Category B2 Level 1</option>
                                            <option value="5">Category C Level 2</option>
                                            <option value="6">Category D Level 3</option>
                                            <option value="7">Category E Level 4</option>
                                            <option value="8">Category F Level 5</option>
                                            <option value="9">Category G Level 6</option>
                                            <option value="10">Category H Level 7</option>
                                            <option value="11">Category I Level 8</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group mb-4">
                                    <div>
                                        <label for="transation_id">Transaction ID/Code <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Enter your Transation ID" id="transation_id" value="{{old(('transation_id'))}}"
                                            name="transation_id"required>
                                            @error('transation_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  
                                 <div class="form-group mb-4">
                                     @php
                                         $paymentText = DB::table('homepage_manages')->where('content_type', 19)->orderBy('id','desc')->first();
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
                             <button type="submit" style="width: 400px; text-align:center; margin: 0 auto !important;" class="btn btn-primary">Submit Registration</button>
     
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('4/1st-abacus-olympiad-2024') }}" class="text-primary">Already registered? Login here</a>
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
        $('#phone_number').on('input', function() {
            var mobileNumber = $(this).val();
            var mobileError = $('#mobileError');
            if (mobileNumber.length !== 11 || isNaN(mobileNumber)) {
                mobileError.text('Phone number must be 11 digits');
            } else {
                mobileError.text('');
            }
        });
        $('#father_contactno').on('input', function() {
            var mobileNumber = $(this).val();
            var mobileError = $('#fathercontactError');
            if (mobileNumber.length !== 11 || isNaN(mobileNumber)) {
                mobileError.text('Phone number must be 11 digits');
            } else {
                mobileError.text('');
            }
        });
        $('#mather_contactno').on('input', function() {
            var mobileNumber = $(this).val();
            var mobileError = $('#mothercontactError');
            if (mobileNumber.length !== 11 || isNaN(mobileNumber)) {
                mobileError.text('Phone number must be 11 digits');
            } else {
                mobileError.text('');
            }
        });
        $('#student_type').on('change', function() {
            var studentInfo = $(this).val();
            if (studentInfo == 'Yes') {
                $('#select_level_form').show(); 
            } else {
                $('#select_level_form').hide(); 
            }
        });
    });
   
</script>
