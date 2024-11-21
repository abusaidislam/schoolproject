@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Gallary</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('gallary') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Albume</label>
                                        <select class="form-control" required name="albume_type" id="albume_type">
                                            <option value="">Select Albume Name</option>
                                            @foreach ($albume as $item)
                                                <option value="{{ $item->id }}">{{ $item->alName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="photStatus" id="photStatus">
                                            @foreach ($activities as $item)
                                            <option value="{{ $item->id }}">{{ $item->actType }}</option>
                                            @endforeach
                                        </select>
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

