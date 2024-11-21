@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card m-2 p-2">
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ url('basicinfo/' . $basicInfo->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Title</label>
                            <input required type="text" class="form-control" id="title" name="title"
                                value="{{ $basicInfo->title }}">
                        </div>
                        <div class="col-md-6">
                            <label for="favicon" class="form-label">Banner Image</label>
                            <input type="file" id="favicon" name="favicon" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Eamil Address" value="{{ $basicInfo->email }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Mobile</label>
                            <input type="number" id="mobile" name="mobile" class="form-control"
                                placeholder="Mobile Number" value="{{ $basicInfo->mobile }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Address</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address"
                                value="{{ $basicInfo->address }}">
                        </div>


                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Facebook Link</label>
                            <input type="text" class="form-control" id="fbLink" name="fbLink"
                                value="{{ $basicInfo->fbLink }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Instagram Link</label>
                            <input type="text" class="form-control" id="instraLink" name="instraLink"
                                value="{{ $basicInfo->instraLink }}">
                        </div>

                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">LinkedIn Link</label>
                            <input type="text" class="form-control" id="youtubeLink" name="youtubeLink"
                                value="{{ $basicInfo->youTubeLink }}">
                        </div>

                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label">Whatsapp Link</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                value="{{ $basicInfo->whatsapp }}">
                        </div>
                        <div class="col-md-6">
                            <label for="google" class="form-label">Address Google Map Embed Code</label>
                            <input type="text-area" class="form-control" id="google" name="google"
                                value="{{ $basicInfo->google }}">

                        </div>
                        <div class="col-md-6">
                            <label for="message" class="form-label">Message:</label>
                            <input type="text" class="form-control" id="message" name="message"
                                value="{{ $basicInfo->message }}">
                        </div>
                        <div class="col-md-12 m-1">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
