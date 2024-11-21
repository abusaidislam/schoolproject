@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Add student Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form"  style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
                            <form action="{{ url('student_info') }}" method="POST" enctype="multipart/form-data" style="width: 90%;  margin-left : 5%; margin-top : 2%">
                                @csrf()
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <div>
                                                <label for="online_corporate">Online Corporate <span class="text-danger">*</span> </label>
                                                <select class="form-control" name="online_corporate" id="online_corporate" >
                                                    <option value="0" selected>Corporate Virtual Branch (Full Course by Zoom online)</option>
                                                    {{-- @foreach ($className as $item)
                                                        <option value="{{ $item->id }}">{{ $item->className }}</option>
                                                    @endforeach --}}
                                                </select>
                                                <p style="text-align: justify; font-size:12px">Admission fee Tk.3,500/- and monthly tuition fee Tk. 1,500/- for all over Bangladesh. We will provide all study material for all levels free of charge.</p>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="student_fullName">Student's Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" style="width: 100%" id="student_fullName" 
                                                    name="student_fullName" placeholder=" Enter Student's Full Name"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                                <select  class="form-control" name="gender" id="gender"  required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="father_name">Father's Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" style="width: 100%" id="father_name"
                                                    name="father_name" placeholder="* Father's Name" tabindex="5" required>
                                            </div>
                                        </div>
                  
                                        <div class="form-group">
                                            <div>
                                                <label for="father_occupation">Father's Occupation ( পিতার পেশা ) <span class="text-danger">*</span></label>
                                                <textarea name="father_occupation" id="father_occupation" class="form-control" style="height: 100px"
                                                    placeholder="Father's Occupation" rows="2"> </textarea>
                                                    <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                                </div>
                                        </div><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="father_contactno">Father's Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="father_contactno" name="father_contactno"
                                                    placeholder="Father's Mobile Number" tabindex="9" required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="mother_name">Mother's  Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" style="width: 100%" id="mother_name"
                                                    name="mother_name" placeholder=" Mother's  Name" tabindex="5" required>
                                            </div>
                                        </div>
                  
                                        <div class="form-group">
                                            <div>
                                                <label for="mather_occupation">Mother's  Occupation ( মাতার পেশা ) <span class="text-danger">*</span></label>
                                                <textarea name="mather_occupation" id="mather_occupation" class="form-control" style="height: 100px"
                                                    placeholder="Mother's  Occupation" rows="2"></textarea>
                                                    <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                                </div>
                                        </div><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="mather_contactno">Mother's  Mobile Number <span class="text-danger">*</span></label>
                                                <input type="phoneno" class="form-control" id="mather_contactno" name="mather_contactno"
                                                    placeholder="Mother's  Mobile Number" tabindex="9" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="contactno">Contact Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="contactno" name="contactno"
                                                    placeholder=" Contact Number" tabindex="9" required>
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
                                        <div class="form-group">
                                            <div>
                                                <label for="dateofbirth"> Date Of Birth <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="school_enrolled">Name of School currently enrolled ( যে স্কুলে পড়ে তার নাম লিখুন)  <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" style="width: 100%" id="school_enrolled"
                                                    name="school_enrolled" placeholder=" " required>
                                                    <p style="text-align: justify; font-size:12px">TIf not attended in school then write NA.</p>
                                                </div>
                                        </div> <br>
                                    
                                        <div class="form-group">
                                            <div>
                                                <label for="present_address">Present Address ( বর্তমান ঠিকানা ) <span class="text-danger">*</span></label>
                                                <textarea name="present_address" id="present_address" class="form-control" tabindex="14"
                                                    placeholder="Permanent Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="course">Select the Course <span class="text-danger">*</span></label>
                                                <select id="course" name="course"  class="form-control" tabindex="10">
                                                    <option value="">Select the Course</option>
                                                    <option value="Senior Course">Senior Course</option>
                                                    <option value="Junior Course">Junior Course</option>
                                                </select>
                                                <p style="text-align: justify; font-size:12px">Please note that only enrolled students can participate in our online Live Zoom Class.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="language">Select Your Preferred Language For Class Lecture <span class="text-danger">*</span></label>
                                                <select id="language" name="language"  class="form-control" tabindex="10">
                                                    <option value="">Select From Dropdown</option>
                                                    <option value="bengali">Bengali</option>
                                                    <option value="english">English</option>
                                                </select>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
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
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="email">Email <span class="text-danger">*</span> </label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email"required>
                                            </div>
                                        </div>  
                                        <div class="form-group">
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

                                        </div>
                                        <div class="form-group">
                                            <label for="payment">Corporate Merchant bKash Number for Payment (নিচের বাম পাশের বক্সে ক্লিক করুন) <span class="text-danger">*</span> </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="payment" name="payment" value="Payment Yes" >
                                                <label class="form-check-label">I am aware of your payment system. I will make the Abacus Math Bangladesh course-related all payments to your corporate bKash Merchant Account No. 018 </label>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="condition_name">Checkboxes (নিচের বাম পাশের বক্সে ক্লিক করুন) * <span class="text-danger">*</span> </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1" name="condition_name" value="1" >
                                                <label class="form-check-label">I have accepted all terms and conditions and privacy policy.</label>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary ml-2 mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
     $('.mpbtn').bind("click", function() {
    $('#inputID').click();
});

function imageLoader(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imageID').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
