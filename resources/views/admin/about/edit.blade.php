@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit About</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input value="{{ $about->title }}" type="text" class="form-control" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="longDescription" id="longDescription">
                                            {!! $about->longDetails !!}
                                        </textarea>
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
