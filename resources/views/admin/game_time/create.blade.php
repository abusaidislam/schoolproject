
@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Create Game Time</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('game-time') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Event</label>
                                        <select class="form-control" required name="level" id="level">
                                            <option value="">Select Game Level</option>
                                            <option value="1">Category A1-Special Category</option>
                                            <option value="2">Category A2-Special Category</option>
                                            <option value="3">Category B1-Level-1</option>
                                            <option value="4">Category B2-Level-1</option>
                                            <option value="5">Category C-Level-2</option>
                                            <option value="6">Category D-Level-3</option>
                                            <option value="7">Category E-Level-4</option>
                                            <option value="8">Category F-Level-5</option>
                                            <option value="9">Category G-Level-6</option>
                                            <option value="10">Category H-Level-7</option>
                                            <option value="11">Category I-Level-8</option>
                                            <option value="12">Flash Category</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Game Time</label>
                                        <input type="number" class="form-control" name="game_time" placeholder="Enter Game Time Minute" required>
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
