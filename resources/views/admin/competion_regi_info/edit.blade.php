@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Competition Regi Manage</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('compition-regi-info/'.$CompetionRegiManage->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    {{-- <div class="form-group col-12">
                                        <label>CompetionRegiManage Name</label>
                                        <input type="text" class="form-control" name="CompetionRegiManage_name" value="{{ $CompetionRegiManage->CompetionRegiManage_name }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value=""> --- Select Status ---</option>
                                            <option value="0" {{ $CompetionRegiManage->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $CompetionRegiManage->status == 1 ? 'selected' : '' }}>InActive</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        {{-- <div class="form-group mb-4">
                                            <div>
                                                <label for="online_corporate">Online Corporate <span class="text-danger">*</span> </label>
                                                <select name="online_corporate" id="online_corporate"  class="form-control">
                                                    <option value="0" selected>Corporate Virtual Branch (Full Course by Zoom online)</option>
                                                </select>
                                                <span style="font-size: 12px; text-align:justify">{!! $corporateText->longDetails?? '' !!}</span>
                                            </div>
                                        </div> --}}
                                        <div class="form-group  mb-4">
                                            <div>
                                                <label for="student_fullName">Student's Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" style="width: 100%" id="student_fullName"
                                                    name="student_fullName" placeholder=" Enter Student's Full Name" value="{{ $CompetionRegiManage->student_fullName }}"  required>
                                                    @error('student_fullName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                      
                                        <div class="form-group mb-4">
                                            <div>
                                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                                <select name="gender" id="gender"  class="form-control" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" {{ $CompetionRegiManage->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $CompetionRegiManage->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div>
                                                <label for="father_name">Father's Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" style="width: 100%" id="father_name" value="{{ $CompetionRegiManage->father_name }}" 
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
                                                    placeholder="Father's Occupation" rows="2">{{ $CompetionRegiManage->father_occupation }}</textarea>
                                                    <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                                    @error('father_occupation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
            
                                        </div>
                                        <div class="form-group mb-4">
                                            <div>
                                                <label for="father_contactno">Father's Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="father_contactno" name="father_contactno" value="{{ $CompetionRegiManage->father_contactno }}"
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
                                                <input type="text" class="form-control" style="width: 100%" id="mother_name"  value="{{ $CompetionRegiManage->mother_name }}"
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
                                                    placeholder="Mother's  Occupation" rows="2">{{ $CompetionRegiManage->mather_occupation }}</textarea>
                                                    <p style="text-align: justify; font-size:12px">This field can’t remain blank. At least write NA.</p>
                                                    @error('mather_occupation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div>
                                                <label for="mather_contactno">Mother's  Mobile Number <span class="text-danger">*</span></label>
                                                <input type="phoneno" class="form-control" id="mather_contactno" name="mather_contactno" value="{{ $CompetionRegiManage->mather_contactno }}"
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
                                                   placeholder="Present Address">{{ $CompetionRegiManage->present_address }}</textarea>
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
                                                <input type="text" class="form-control" style="width: 100%" id="school_enrolled" value="{{ $CompetionRegiManage->school_enrolled }}"
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
                                               <select id="class_name" name="class_name" class="form-control" tabindex="10" required>
                                                   <option value="" disabled selected>Select Class Name</option>
                                                   <option value="Junior One" {{ $CompetionRegiManage->class_name == 'Junior One' ? 'selected' : '' }}>Junior One</option>
                                                   <option value="One" {{ $CompetionRegiManage->class_name == 'One' ? 'selected' : '' }}>One</option>
                                                   <option value="Two" {{ $CompetionRegiManage->class_name == 'Two' ? 'selected' : '' }}>Two</option>
                                                   <option value="Three" {{ $CompetionRegiManage->class_name == 'Three' ? 'selected' : '' }}>Three</option>
                                                   <option value="Four" {{ $CompetionRegiManage->class_name == 'Four' ? 'selected' : '' }}>Four</option>
                                                   <option value="Five" {{ $CompetionRegiManage->class_name == 'Five' ? 'selected' : '' }}>Five</option>
                                                   <option value="Six" {{ $CompetionRegiManage->class_name == 'Six' ? 'selected' : '' }}>Six</option>
                                                   <option value="Seven" {{ $CompetionRegiManage->class_name == 'Seven' ? 'selected' : '' }}>Seven</option>
                                                   <option value="Eight" {{ $CompetionRegiManage->class_name == 'Eight' ? 'selected' : '' }}>Eight</option>
                                                   <option value="Nine" {{ $CompetionRegiManage->class_name == 'Nine' ? 'selected' : '' }}>Nine</option>
                                                   <option value="Ten" {{ $CompetionRegiManage->class_name == 'Ten' ? 'selected' : '' }}>Ten</option>
                                                   <option value="Eleven" {{ $CompetionRegiManage->class_name == 'Eleven' ? 'selected' : '' }}>Eleven</option>
                                                   <option value="Twelve" {{ $CompetionRegiManage->class_name == 'Twelve' ? 'selected' : '' }}>Twelve</option>
                                               </select>
                                           </div>
                                       </div>
                                      
                                       <div class="form-group mb-4">
                                           <div>
                                               <label for="dateofbirth"> Date Of Birth <span class="text-danger">*</span></label>
                                               <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ $CompetionRegiManage->dateofbirth }}"
                                                   required>
                                                   @error('dateofbirth')
                                                   <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                       <div class="form-group mb-4">
                                           <div>
                                               <label for="phone_number">Login Phone Number <span class="text-danger">*</span></label>
                                               <input type="number" class="form-control" id="phone_number" name="phone_number"  value="{{ $CompetionRegiManage->phone_number }}"
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
                                                <input type="password" class="form-control" placeholder="Enter Password" id="password" value="{{$CompetionRegiManage->text_password}}" 
                                                    name="password">
                                                    @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="form-group mb-4">
                                            <label for="student_type">Select Student Type:<span class="text-danger">*</span></label>
                                            <select id="student_type" name="student_type" class="form-control" tabindex="10" required>
                                                <option value="" disabled selected>Select Student Type</option>
                                                <option value="Yes" {{ $CompetionRegiManage->student_type == 'Yes' ? 'selected' : '' }}>Abacus Math Bangladesh Student</option>
                                                <option value="No" {{ $CompetionRegiManage->student_type == 'No' ? 'selected' : '' }}>Non-Abacus Math Bangladesh Student</option>
                                            </select>
                                        </div>
       
                                       <!-- Hidden Select Level Form -->
                                       <div id="select_level_form" class="form-group mb-4" style="display: none;">
                                        <label for="level_name">Select Level<span class="text-danger">*</span></label>
                                        <select id="level_name" name="level_name" class="form-control" tabindex="10" required>
                                            <option value="" disabled selected>Select Level</option>
                                            <option value="1" {{ $CompetionRegiManage->level_name == '1' ? 'selected' : '' }}>Special Category A1</option>
                                            <option value="2" {{ $CompetionRegiManage->level_name == '2' ? 'selected' : '' }}>Special Category A2</option>
                                            <option value="3" {{ $CompetionRegiManage->level_name == '3' ? 'selected' : '' }}>Category B1 Level 1</option>
                                            <option value="4" {{ $CompetionRegiManage->level_name == '4' ? 'selected' : '' }}>Category B2 Level 1</option>
                                            <option value="5" {{ $CompetionRegiManage->level_name == '5' ? 'selected' : '' }}>Category C Level 2</option>
                                            <option value="6" {{ $CompetionRegiManage->level_name == '6' ? 'selected' : '' }}>Category D Level 3</option>
                                            <option value="7" {{ $CompetionRegiManage->level_name == '7' ? 'selected' : '' }}>Category E Level 4</option>
                                            <option value="8" {{ $CompetionRegiManage->level_name == '8' ? 'selected' : '' }}>Category F Level 5</option>
                                            <option value="9" {{ $CompetionRegiManage->level_name == '9' ? 'selected' : '' }}>Category G Level 6</option>
                                            <option value="10" {{ $CompetionRegiManage->level_name == '10' ? 'selected' : '' }}>Category H Level 7</option>
                                            <option value="11" {{ $CompetionRegiManage->level_name == '11' ? 'selected' : '' }}>Category I Level 8</option>
                                        </select>
                                    </div>
                                        <div class="form-group mb-4">
                                           <div>
                                               <label for="transation_id">Transaction ID/Code <span class="text-danger">*</span> </label>
                                               <input type="text" class="form-control" placeholder="Enter your Transation ID" id="transation_id" value="{{ $CompetionRegiManage->transation_id}}"
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
                                                <input class="form-check-input" type="checkbox" id="payment" name="payment" value="Payment Yes" {{  $CompetionRegiManage->payment ?? '' == 'Payment Yes' ? 'checked' : '' }} >
                                                <label class="form-check-label">{!! $paymentText->longDetails ?? '' !!} </label>
                                              </div>
                                              @error('payment')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                          </div>
                                        <div class="form-group mb-4">
                                            <label for="condition_name">Checkboxes (নিচের বাম পাশের বক্সে ক্লিক করুন)<span class="text-danger">*</span> </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1" name="condition_name" value="1"  {{  $CompetionRegiManage->condition_name ?? '' == '1' ? 'checked' : '' }} >
                                                <label class="form-check-label">I have accepted all terms and conditions and privacy policy.</label>
                                              </div>
                                              @error('condition_name')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                          </div>
                                  
                                    </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary ml-2 mt-3">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
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
           if ($('#student_type').val() === 'Yes') {
            $('#select_level_form').show();
        }
       });
      
   </script>