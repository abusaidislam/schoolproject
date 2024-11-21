
@extends('layouts.master')
@section('content')

  <!-- About Start -->
    <div class=" py-5 bg-white">
        <div class="container" style="min-height: 500px;" >
            @if(session('message'))
            <h4 class="text-center">{{ session('message') }}</h4> <br>
                @endif
            <div class="row">
                <div class="p-4 col-lg-4 col-md-4 col-sm-12 bg-info" style="margin: 0 auto;  box-shadow: 5px 5px 30px black; border-radius: 10px">
                    <form method="POST" action="{{ url('competion-login') }}"
                            id="myForm" enctype="multipart/form-data">
                            @csrf()
                            <br>
                            <h3 class="text-center">Competion Login</h3><hr>
                        <div class="form-group mt-3">
                             <label for="phone_number" class="col-sm-12 control-label">Phone Number:</label>
                             <div class="col-sm-12">
                                <input type="number" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pwd"class="col-sm-12 control-label">Password:</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                            </div>
                        </div>
{{--                       
                        <div class="form-check mt-3">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                          </label>
                        </div> --}}
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                    </form><br>
                  
                </div> 
            </div>
     
          
        </div>
  
    </div>
    <!-- About End -->
   
   @endsection