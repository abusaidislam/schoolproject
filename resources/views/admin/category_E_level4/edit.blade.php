@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Category E Level 4 </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('category-e-level4/'.$CategoryELevel4->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Digit Length1</label>
                                        <input type="number" class="form-control" name="num_length1" value="{{ $CategoryELevel4->num_length1 }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Digit Length2</label>
                                        <input type="number" class="form-control" name="num_length2" value="{{ $CategoryELevel4->num_length2 }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Row</label>
                                        <input type="number" class="form-control" name="num_row" value="{{ $CategoryELevel4->num_row }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Display</label>
                                        <input type="number" class="form-control" name="num_display" value="{{ $CategoryELevel4->num_display }}">
                                    </div>
                                  
                                    <div class="form-group col-12">
                                        <label>Number Condition</label>
                                        <input type="number" class="form-control" name="num_condition" value="{{ $CategoryELevel4->num_condition }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Type</label>
                                        <select class="form-control" required name="type" id="type">
                                            <option value=""> --- Select Type ---</option>
                                            <option value="plus" {{ $CategoryELevel4->type == 'plus' ? 'selected' : '' }}>Addition / Subtraction</option>
                                            <option value="multiply" {{ $CategoryELevel4->type == 'multiply' ? 'selected' : '' }}>Multiplication</option>
                                            <option value="divide" {{ $CategoryELevel4->type == 'divide' ? 'selected' : '' }}>Division</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value=""> --- Select Status ---</option>
                                            <option value="0" {{ $CategoryELevel4->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $CategoryELevel4->status == 1 ? 'selected' : '' }}>In Active</option>
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
