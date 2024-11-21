@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Video Gallary</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('video/' . $video->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    {{-- <div class="form-group col-12">
                                        <label>Select Albume</label>
                                        <select class="form-control" required name="albume_type" id="albume_type">
                                            <option value="">Select Albume</option>
                                            @foreach ($albume as $item)
                                            <option
                                                @if ($gallary->albume_type == $item->id)
                                                    selected
                                                @endif
                                                value="{{ $item->id }}">{{ $item->alName }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input value="{{ $video->title }}" type="text" class="form-control"
                                            name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Video Embed Code</label>
                                        <textarea name="vcode" id="vcode" cols="30" rows="6" class="form-control"> {{ $video->vcode }}</textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="vStatus" id="vStatus">
                                            <option value="Active" selected>Active</option>
                                            <option value="Inactive">Inactive</option>
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
