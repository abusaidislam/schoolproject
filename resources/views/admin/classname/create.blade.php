@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Class Timetable Manage</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('class_time') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="day">* Day</label>
                                        <select class="form-control" name="day" id="day" 
                                            value="" required>
                                            <option value=""> --- Select Day---</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Subject Name</label>
                                        <input type="text" class="form-control" name="subject_name" required
                                            placeholder="Enter Subject Name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Start Time</label>
                                        <input type="time" class="form-control" name="start_time" required
                                            placeholder="Enter Start Time">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>End Time</label>
                                        <input type="time" class="form-control" name="end_time" required
                                            placeholder="Enter End Time">
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
