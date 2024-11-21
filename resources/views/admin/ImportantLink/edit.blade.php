@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Important Link</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('important_link/' . $importantLink->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title"
                                        value="{{ $importantLink->title }}" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Link</label>
                                        <input type="text" class="form-control" name="link"
                                        value="{{ $importantLink->link }}" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="linkstatus" id="linkstatus">
                                            <option value=""> --- Select Status ---</option>
                                            @foreach ($activities as $item)
                                            <option
                                                @if ($importantLink->linkstatus == $item->id)
                                                    selected
                                                @endif
                                                value="{{ $item->id }}">{{ $item->actType }}</option>
                                            @endforeach
                                        </select>
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
