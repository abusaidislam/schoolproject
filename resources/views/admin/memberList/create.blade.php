@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Teacher</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('teacher_list') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="teachername">* Teacher/Staff Name</label>
                                            <input type="text" name="teachername" id="teachername" tabindex="1"
                                                class="form-control" placeholder="*....Teacher/Staff Name" value=""
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">* Designation</label>
                                            <select class="form-control" name="designation" id="designation" tabindex="3"
                                                value="" required>
                                                <option value=""> --- Select Designation---</option>
                                                @foreach ($content as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eduqualification">Educational Qualitification</label>
                                            <textarea class="form-control" rows="2" name="eduqualification" id="eduqualification" value=""
                                                tabindex="5" placeholder="Educational Qualitification"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fathername">* Fathers Name</label>
                                            <input type="text" name="fathername" id="fathername" tabindex="7"
                                                class="form-control" placeholder="*....Fathers Name" value=""
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="presentaddress">Present Address</label>
                                            <textarea name="presentaddress" id="presentaddress" class="form-control" tabindex="9" placeholder="Present Address"></textarea>
                                            </td>
                                        </div>
                                        <div class="form-group">
                                            <label for="joiningdate">* Joining Date</label>
                                            <input type="date" name="joiningdate" id="joiningdate" tabindex="11"
                                                class="form-control" placeholder="*....Joining Date" value=""
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_name">Gender *</label>
                                            <select class="form-control" name="gender" id="gender" tabindex="13"
                                                value="" required>
                                                <option value=""> --- Select Gender *---</option>
                                                @foreach ($gender as $item)
                                                    <option value="{{ $item->id }}">{{ $item->genderType }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_name">Relegion</label>
                                            <select class="form-control" name="relegion" id="relegion" tabindex="15"
                                                value="">
                                                <option value=""> --- Select Relegion ---</option>
                                                @foreach ($relegion as $item)
                                                    <option value="{{ $item->id }}">{{ $item->relegionName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactno">* Contact No</label>
                                            <input type="text" name="contactno" id="contactno" tabindex="17"
                                                class="form-control" placeholder="*...Contact No" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <input type="date" name="dateofbirth" id="dateofbirth" tabindex="4"
                                                class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_name">Status *</label>
                                            <select class="form-control" name="status" id="status" tabindex="16"
                                                value="" required>
                                                <option value=""> --- Select Status ---</option>
                                                @foreach ($activities as $item)
                                                    <option value="{{ $item->id }}">{{ $item->actType }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook-links :</label>
                                            <input type="text" class="form-control" name="fb_link"
                                                placeholder=" Enter Facebook-links ">
                                        </div>
                                        <div class="form-group">
                                            <label>twitter-links :</label>
                                            <input type="text" class="form-control" name="tw_link"
                                                placeholder=" Enter twitter-links ">
                                        </div>
                                        <div class="form-group">
                                            <label>linkedin-links :</label>
                                            <input type="text" class="form-control" name="lin_link"
                                                placeholder=" Enter linkedin-links ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight:bold;">* Upload file &nbsp;&nbsp;&nbsp;(180px X 220px)
                                            </div>
                                            <label class="mpbtn col-md-3" style="cursor:pointer"><br>
                                                <img id="imageID" style="max-width:100%;" class="img-thumbnail"
                                                    src="{{ asset('public/assets/no_image.jpg') }}">
                                                <input id="inputID" name="image" style="display:none"
                                                    onchange="imageLoader(this);" type="file" accept="image/*">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">* Subject</label>
                                            <input type="text" name="subject" id="subject" tabindex="4"
                                                class="form-control" placeholder="*...Subject" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="mothername">* Mother's Name</label>
                                            <input type="text" name="mothername" id="mothername" tabindex="6"
                                                class="form-control" placeholder="*...Mother's Name" value=""
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="permanentaddress">Permanent Address</label>
                                            <textarea class="form-control" rows="2" name="permanentaddress" id="permanentaddress" value=""
                                                tabindex="8" placeholder="Permanent Address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="promotiondate">Promotion Date</label>
                                            <input type="date" name="promotiondate" id="promotiondate" tabindex="10"
                                                class="form-control" placeholder="Promotion Date" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_name">Blood Group</label>
                                            <select class="form-control" name="bloodgroup" id="bloodgroup"
                                                tabindex="8" value="">
                                                <option value=""> --- Select Blood Group ---</option>
                                                @foreach ($bloodGroup as $item)
                                                    <option value="{{ $item->id }}">{{ $item->groupName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_name">National ID</label>
                                            <input type="text" name="nationalid" id="nationalid" tabindex="14"
                                                class="form-control" placeholder="...National ID..." value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <div>
                                                <input type="email" name="email" id="email" tabindex="16"
                                                    class="form-control" placeholder="*....Email...." value=""
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password *</label>
                                            <input type="password" name="password" id="password" tabindex="18"
                                                class="form-control" placeholder="*....Password...." value=""
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <div style="font-weight:bold;">* Upload CV </div>
                                            <input type="file" name="cv_upload" id="cv_upload" class="form-control">
                                            {{-- <label class="mpbtncv col-md-3" style="cursor:pointer"><br>
                                                <img id="inputIDcv" style="max-width:100%;" class="img-thumbnail" src="{{ asset('public/assets/no_image.jpg') }}">
                                                <input id="inputIDcv" name="cv_upload" style="display:none"
                                                onchange="imageLoadercv(this);" type="file" accept="image/*">
                                            </label> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="dateofbirth">Instagram Links</label>
                                            <input type="text" class="form-control" name="ins_link"
                                                placeholder=" Enter linkedin-links ">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
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
        $('.mpbtncv').bind("click", function() {
            $('#inputIDcv').click();
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

        function imageLoadercv(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#inputIDcv').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
