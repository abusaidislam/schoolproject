@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Category C Level 2</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('competition-category-level2') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Digit Length</label>
                                        <input type="number" class="form-control" name="num_length" placeholder="Digit Length">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Row</label>
                                        <input type="number" class="form-control" name="num_row" placeholder="Number Row">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number Display</label>
                                        <input type="number" class="form-control" name="num_display" placeholder="Number Display">
                                    </div>
                                 
                                    <div class="form-group col-12">
                                        <label>Number Condition</label>
                                        <input type="number" class="form-control" name="num_condition" placeholder="Number Condition">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value="0" selected>Active</option>
                                            <option value="1">In Active</option>
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
