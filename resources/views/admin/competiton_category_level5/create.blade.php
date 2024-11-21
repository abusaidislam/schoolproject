@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Competition Category Level 5</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('competition-category-level5') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Digit Length1</label>
                                        <input type="number" class="form-control" name="num_length1" placeholder="Digit Length1">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Digit Length2</label>
                                        <input type="number" class="form-control" name="num_length2" placeholder="Digit Length2">
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
                                        <label>Type</label>
                                        <select class="form-control" required name="type" id="type">
                                            <option value="" selected>Choose One</option>
                                            <option value="plus">Addition / Subtraction</option>
                                            <option value="multiply">Multiplication</option>
                                            <option value="divide">Division</option>
                                        </select>
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
