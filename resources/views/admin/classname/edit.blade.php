@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Class Timetable</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('class_time/' . $className->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="day">* Day</label>
                                        <select class="form-control" name="day" id="day" 
                                            value="" required>
                                            <option value="Saturday" {{ $className->day == "Saturday" ? "selected" : "" }}>Saturday</option>
                                            <option value="Sunday" {{ $className->day == "Sunday" ? "selected" : "" }}>Sunday</option>
                                            <option value="Monday" {{ $className->day == "Monday" ? "selected" : "" }}>Monday</option>
                                            <option value="Tuesday" {{ $className->day == "Tuesday" ? "selected" : "" }}>Tuesday</option>
                                            <option value="Wednesday" {{ $className->day == "Wednesday" ? "selected" : "" }}>Wednesday</option>
                                            <option value="Thursday" {{ $className->day == "Thursday" ? "selected" : "" }}>Thursday</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Subject Name</label>
                                        <input type="text" class="form-control" value="{{ $className->subject_name }}" name="subject_name" required
                                            placeholder="Enter Subject Name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Start Time</label>
                                        <input type="time" class="form-control" value="{{ $className->start_time }}" name="start_time" required
                                            placeholder="Enter Start Time">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>End Time</label>
                                        <input type="time" class="form-control" value="{{ $className->end_time }}" name="end_time" required
                                            placeholder="Enter End Time">
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
