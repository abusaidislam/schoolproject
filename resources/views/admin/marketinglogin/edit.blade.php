@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Marketing Login Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('marketing-login/'.$MarketingLogin->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="uname" value="{{ $MarketingLogin->user_name }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" value="{{ $MarketingLogin->text_password }}">
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
