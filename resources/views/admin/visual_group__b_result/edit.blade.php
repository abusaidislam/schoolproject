@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Special Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('special-category/'.$SpacialCategory->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Number Length</label>
                                        <input type="number" class="form-control" name="num_length" value="{{ $SpacialCategory->num_length }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Display</label>
                                        <input type="number" class="form-control" name="num_display" value="{{ $SpacialCategory->num_display }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Row</label>
                                        <input type="number" class="form-control" name="num_row" value="{{ $SpacialCategory->num_row }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Game Time</label>
                                        <input type="number" class="form-control" name="game_time" value="{{ $SpacialCategory->game_time }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value=""> --- Select Status ---</option>
                                            <option value="0" {{ $SpacialCategory->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $SpacialCategory->status == 1 ? 'selected' : '' }}>In Active</option>
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
