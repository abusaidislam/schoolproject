@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Flash Competition</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('flash-competition-category') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Level</label>
                                        <select class="form-control" required name="category" id="category">
                                            <option value="" selected>Choose One</option>
                                            <option value="1">Level-1</option>
                                            <option value="2">Level-2</option>
                                            <option value="3">Level-3</option>
                                            <option value="4">Level-4</option>
                                            <option value="5">Level-5</option>
                                            <option value="6">Level-6</option>
                                            <option value="7">Level-7</option>
                                            <option value="8">Level-8</option>
                                            <option value="9">Level-9</option>
                                            <option value="10">Level-10</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number of Digits</label>
                                        <input type="number" class="form-control" name="num_length" placeholder="Number of Digits">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number of Rows</label>
                                        <input type="number" class="form-control" name="num_row" placeholder="Number of Rows">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number of Question</label>
                                        <input type="number" class="form-control" name="num_display" placeholder="Number of Question">
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
