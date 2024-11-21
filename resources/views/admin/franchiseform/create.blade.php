@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Franchise Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('franchise-form') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Type</label>
                                        <select class="form-control" required name="type" id="type">
                                            <option value="" selected>Choose One</option>
                                            <option value="0">Center</option>
                                            <option value="1">Interested</option>
                                            <option value="2">About Us</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
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
