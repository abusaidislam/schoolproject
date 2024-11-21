@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Marketing Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="card p-1 m-1">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            {{-- <a href="{{ url('marketing/create') }}"class="btn btn-primary mb-3">Add New</a> --}}
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Area Name</th>
                                        <th>Sub-Area Name</th>
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>Parent Name</th>
                                        <th>Mobile</th>
                                        <th>Class Name</th>
                                        <th>School Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        @php
                                        $areaName = DB::table('areas')->where('id', $item->area_id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $areaName?$areaName->area_name:'' }}</td>
                                            <td>{{ $item->sub_name }}</td>
                                            <td>{{ $item->stu_name }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->parent_name }}</td>
                                            <td>{{ $item->Mobile_no }}</td>
                                            <td>{{ $item->class_name }}</td>
                                            <td>{{ $item->school_name }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    {{-- <a href="{{ url('area/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a> --}}
                                                    <form action="{{ url('marketing/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
