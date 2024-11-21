@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Marketing Login Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('marketing-login') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="uname" placeholder="User Name">
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <label for="password" class="form-label">Password:</label>
                                        <div class="password-container">
                                          <input type="password" class="form-control" id="password" value="{{ old('password') }}"  onfocus="this.placeholder = ''" placeholder="Enter password" name="password" required>
                                          <span class="" id="toggle-password">
                                              <i class="fa fa-eye-slash" aria-hidden="true" style="float: right; margin-right: 10px; margin-top: -27px; position: relative; z-index: 2; color:#909790;"></i>
                                          </span>
                                          
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

 <script>
       $(document).ready(function() {
        $("#toggle-password").click(function() {
            var passwordField = $("#password");
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordField.attr('type', 'password');
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
        });
</script>

@endsection

