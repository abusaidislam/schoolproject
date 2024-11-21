@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Feature</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('home_feature/' . $home_feature->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input value="{{ $home_feature->title }}" type="text" class="form-control"
                                            name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-12">
                                        <div style="font-weight:bold;">* Upload file
                                            {{-- &nbsp;&nbsp;&nbsp;(180px X 220px) --}}
                                        </div>
                                        <label class="mpbtn col-md-3" style="cursor:pointer"><br>
                                            <img id="imageID" style="max-width:100%" class="img-thumbnail"
                                                src="{{ asset('public/assets/no_image.jpg') }}">
                                            <input id="inputID" name="image" style="display:none"
                                                onchange="imageLoader(this);" type="file" accept="image/*">
                                        </label>
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
@section('script')
    <script type="text/javascript">
        $('.mpbtn').bind("click", function() {
            $('#inputID').click();
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
    </script>
@endsection
