@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Sub-Area</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('sub-area/'.$SubArea->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Area Name</label>
                                        <select class="form-control" required name="area_id" id="area_id">
                                            <option value=""> --- Select Area ---</option>
                                            @foreach ($Area as $item)
                                            <option value="{{ $item->id }}" {{ $SubArea->area_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->area_name }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div> 
                                     <div class="form-group col-12">
                                        <label>Sub-Area Name</label>
                                        <input type="text" class="form-control" name="sub_name" value="{{ $SubArea->sub_name }}">
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
