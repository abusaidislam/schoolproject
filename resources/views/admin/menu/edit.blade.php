@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('menu/' . $Menu->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Menu Name</label>
                                        <input value="{{ $Menu->name }}" type="text" class="form-control"
                                            name="name" placeholder="Enter Menu Name">
                                    </div>
                                  
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="mstatus" id="mstatus">
                                            <option value=""> --- Select Status ---</option>
                                                @foreach ($activities as $item)
                                                <option
                                                    @if ($Menu->mstatus == $item->id)
                                                        selected
                                                    @endif
                                                    value="{{ $item->id }}">{{ $item->actType }}</option>
                                                @endforeach
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
