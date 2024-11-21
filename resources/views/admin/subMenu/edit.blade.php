@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="p-1">Edit Sub-Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('sub-menu/' . $SubMenu->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Menu</label>
                                        <select class="form-control" required name="menu_id" id="menu_id">
                                            <option value="">--Select--</option>
                                            @foreach ($data as $item)
                                            <option
                                                @if ($SubMenu->menu_id == $item->id)
                                                    selected
                                                @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Sub-Menu Name</label>
                                        <input type="text" class="form-control" name="submenu"
                                            placeholder="Enter Sub-Menu Name" value="{{ $SubMenu->submenu }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <select class="form-control" required name="status" id="status">
                                            <option value=""> --- Select Status ---</option>
                                            <option value="0" {{ $SubMenu->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $SubMenu->status == 1 ? 'selected' : '' }}>InActive</option>
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
