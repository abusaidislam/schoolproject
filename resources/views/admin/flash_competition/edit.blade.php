@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Flash Competition</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('flash-competition-category/'.$FlashCompetition->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Level</label>
                                        <select class="form-control" required name="category" id="category">
                                            <option value="">Choose One</option>
                                            <option value="1" {{ $FlashCompetition->category == 1 ? 'selected' : '' }}>Level-1</option>
                                            <option value="2" {{ $FlashCompetition->category == 2 ? 'selected' : '' }}>Level-2</option>
                                            <option value="3" {{ $FlashCompetition->category == 3 ? 'selected' : '' }}>Level-3</option>
                                            <option value="4" {{ $FlashCompetition->category == 4 ? 'selected' : '' }}>Level-4</option>
                                            <option value="5" {{ $FlashCompetition->category == 5 ? 'selected' : '' }}>Level-5</option>
                                            <option value="6" {{ $FlashCompetition->category == 6 ? 'selected' : '' }}>Level-6</option>
                                            <option value="7" {{ $FlashCompetition->category == 7 ? 'selected' : '' }}>Level-7</option>
                                            <option value="8" {{ $FlashCompetition->category == 8 ? 'selected' : '' }}>Level-8</option>
                                            <option value="9" {{ $FlashCompetition->category == 9 ? 'selected' : '' }}>Level-9</option>
                                            <option value="10" {{ $FlashCompetition->category == 10 ? 'selected' : '' }}>Level-10</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number of Digits</label>
                                        <input type="number" class="form-control" name="num_length" value="{{ $FlashCompetition->num_length }}">
                                    </div>
                                  
                                    <div class="form-group col-12">
                                        <label>Number of Rows</label>
                                        <input type="number" class="form-control" name="num_row" value="{{ $FlashCompetition->num_row }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Number of Question</label>
                                        <input type="number" class="form-control" name="num_display" value="{{ $FlashCompetition->num_display }}">
                                    </div>
                                   
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value=""> --- Select Status ---</option>
                                            <option value="0" {{ $FlashCompetition->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $FlashCompetition->status == 1 ? 'selected' : '' }}>In Active</option>
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
