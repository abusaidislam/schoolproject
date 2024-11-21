@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
            <div
                style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
                <form id="add-user-form" action="{{ url('marketing-data-store/') }}" method="POST" enctype="multipart/form-data"
                    style="width: 90%;  margin-left : 5%; margin-top : 2%">
                    @csrf
                    <div class="row">
                        <div style="display: flex; justify-content: flex-end;">
                            <a class="btn btn-info" style="width: 120px;" href="{{ route('logout.marketing') }}">Logout</a>
                        </div>
                        {{-- <h4 style="color:rgb(151, 85, 182); text-align:center">{{ session('message') }}</h4> <br> --}}
                        <div>
                            <h4 style="text-align: center; padding-bottom:10px;text-decoration: underline; color:green">
                                Marketing Form</h4>
                        </div>

                         {{-- <p>{{$admissionLogin->user_name}}</p> --}}
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group mb-3">
                                <div>
                                    <label for="area_id">Select Area<span class="text-danger">*</span> </label>
                                    <select name="area_id" id="area_id"  class="form-select" required>
                                        <option value="" selected>--Select Area--</option>
                                        @foreach ($Area as $item)
                                            <option value="{{ $item->id }}">{{ $item->area_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="sub_name">Select Sub-Area<span class="text-danger">*</span> </label>
                                    <select name="sub_name" id="sub_name"  class="form-select" required>
                                        <option value="" selected>--Select SubArea--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="stu_name">Student's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="stu_name"
                                        name="stu_name" placeholder=" Enter Student's Name"  value="{{old(('stu_name'))}}" required>
                                        @error('stu_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender"  class="form-select" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="parent_name">Parent's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" style="width: 100%" id="parent_name"
                                        name="parent_name" placeholder="Parent's Name" value="{{old(('parent_name'))}}" required>
                                        @error('parent_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label for="Mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Mobile_no" name="Mobile_no" value="{{old(('Mobile_no'))}}" placeholder="Mobile Number" required>
                                    <span id="mobileError" class="text-danger"></span>
                                    @error('Mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group  mb-3">
                                <div>
                                    <label for="class_name">Class Name<span class="text-danger">*</span></label>
                                    <select name="class_name" id="class_name"  class="form-select" required>
                                        <option value="">Choose One</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  mb-3">
                                <div>
                                    <label for="school_name">School Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="school_name" name="school_name" value="{{old(('school_name'))}}" placeholder="School Name"
                                        required>
                                    @error('school_name')
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
        $('#area_id').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: '{{ url('areaName') }}/' + id,  
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sub_name').empty();
                        $('#sub_name').append('<option value="" selected> --- Select Sub-Area --- </option>');  // Optional default option
                        $.each(data, function(index, subArea) {
                            $('#sub_name').append('<option value="' + subArea.sub_name + '">' + subArea.sub_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching sub-areas:', error);  
                    }
                });
            } 
        });
        $('#Mobile_no').on('input', function() {
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
