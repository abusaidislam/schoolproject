@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
           
            <div style="padding:15px 0px; margin-top:15px; margin-bottom:15px; border:1px solid #eee; background-color:#f0f1ef;">
               <div class="row">
              
               </div>

               <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white text-center p-4">
                                <h4 class="text-white">Competition Login</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('competition-login/') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                                    </div>
            
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                    </div>
            
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ url('competition-register-form') }}" class="text-primary">Don't have an account? Register here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
              
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
