

@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Game Time</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('game-time/'.$GameTime->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Select Game Level</label>
                                        <select class="form-control" required name="level" id="level">
                                           
                                            <option value="">Select Game Level</option>
                                            <option value="1"{{ $GameTime->level == '1' ? 'selected' : '' }}>Category A1-Special Category</option>
                                            <option value="2"{{ $GameTime->level == '2' ? 'selected' : '' }}>Category A2-Special Category</option>
                                            <option value="3"{{ $GameTime->level == '3' ? 'selected' : '' }}>Category B1-Level-1</option>
                                            <option value="4"{{ $GameTime->level == '4' ? 'selected' : '' }}>Category B2-Level-1</option>
                                            <option value="5"{{ $GameTime->level == '5' ? 'selected' : '' }}>Category C-Level-2</option>
                                            <option value="6"{{ $GameTime->level == '6' ? 'selected' : '' }}>Category D-Level-3</option>
                                            <option value="7"{{ $GameTime->level == '7' ? 'selected' : '' }}>Category E-Level-4</option>
                                            <option value="8"{{ $GameTime->level == '8' ? 'selected' : '' }}>Category F-Level-5</option>
                                            <option value="9"{{ $GameTime->level == '9' ? 'selected' : '' }}>Category G-Level-6</option>
                                            <option value="10"{{ $GameTime->level == '10' ? 'selected' : '' }}>Category H-Level-7</option>
                                            <option value="11"{{ $GameTime->level == '11' ? 'selected' : '' }}>Category I-Level-8</option>
                                            <option value="12" {{ $GameTime->level == '12' ? 'selected' : '' }}>Flash Category</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Game Time</label>
                                        <input type="number" class="form-control" name="game_time" value="{{ $GameTime->game_time }}" placeholder="Enter Game Time Minute" required>
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
