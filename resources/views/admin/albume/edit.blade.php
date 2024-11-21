@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Albume</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('albume/'.$albume->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Album Name</label>
                                        <input type="text" class="form-control" name="alName" value="{{ $albume->alName }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>	Album Status</label>
                                        <select class="form-control" required name="alStatus" id="alStatus">
                                            <option value=""> --- Select Status ---</option>
                                            @foreach ($activities as $item)
                                            <option
                                                @if ($albume->alStatus == $item->id)
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
