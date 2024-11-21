

@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Calender Event</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('calender-event/'.$CalenderEvent->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Select Event</label>
                                        <select class="form-control" required name="event_type" id="event_type">
                                            <option value="">Select Event Name</option>
                                            <option value="Calender of Event" {{ $CalenderEvent->event_type == 'Calender of Event' ? 'selected' : '' }}>Calender of Event</option>
                <option value="Training Schedule" {{ $CalenderEvent->event_type == 'Training Schedule' ? 'selected' : '' }}>Training Schedule</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date" value="{{ $CalenderEvent->event_date }}" placeholder="Enter Date" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Title/Text/Date</label>
                                        <input type="text" class="form-control" name="title_text" value="{{ $CalenderEvent->title_text }}" required placeholder="Enter Title or Text or Date">
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
