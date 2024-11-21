@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('homepagemanage/' . $homepagemanage->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Content</label>
                                        <select class="form-control" name="content_type" id="content_type">
                                            <option value="">Select Content</option>
                                            @foreach ($content as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $homepagemanage->content_type == $item->id ? 'selected' : '' }}>
                                                    {{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <strong style="color: red">OR</strong>
                                    <div class="form-group col-12">
                                        <label>Top Menu</label>
                                        <select class="form-control" name="menuId" id="menuId">
                                            <option value="">Select Top Menu</option>
                                            @foreach ($topManu as $item)
                                                <option @if ($homepagemanage->menuId == $item->id) selected @endif
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Select Submenu Content</label>
                                        <select class="form-control" name="subMenuId" id="subMenuId">
                                            <option value="{{ $homepagemanage->subMenuId }}" selected>
                                                {{ $homepagemanage->subMenuName }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input value="{{ $homepagemanage->title }}" type="text" class="form-control"
                                            name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Sort Description (Name)</label>
                                        <textarea class="form-control" name="shortDetails" id="shortDetails">
                                            {{ $homepagemanage->shortDetails }}
                                        </textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Long Description</label>
                                        <textarea class="form-control" name="longDescription" id="longDescription">{{ $homepagemanage->longDetails }}</textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Upload Document</label>
                                        <input type="file" class="form-control" name="doumentfile">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#shortDetails').summernote({
                placeholder: 'Short Description',
                tabsize: 2,
                height: 100
            });
            $('#longDescription').summernote({
                placeholder: 'Long Description',
                tabsize: 2,
                height: 100
            });
        });
        $(document).ready(function() {
            $('#menuId').change(function() {
                var menuId = $('#menuId').find('option:selected').val();
                // alert(menuId);
                $.ajax({
                    url: "{{ url('menu_type') }}/" + menuId,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var output = '<option value="">Select Sub Menu</option>';
                        $.each(data, function(key, value) {
                            output += '<option value="' + value.id + '">' + value
                                .submenu + '</option>';
                        });
                        $('#subMenuId').html(output);
                    }
                });
            });
        });
    </script>
@endsection
