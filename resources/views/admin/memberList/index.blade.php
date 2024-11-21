@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Teacher List</h1>
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
                            <a href="{{ url('teacher_list/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Teacher Name</th>
                                        <th>Designation</th>
                                        <th>Details</th>
                                        <th>Image</th>
                                        <th>CV</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        @php
                                            $designation = DB::table('member_categories')
                                                ->where('id', '=', $item->designation)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->teachername }}</td>
                                            @if ($designation)
                                                <td>{{ $designation->title }}</td>
                                            @else
                                                <td>Category Not Found</td>
                                            @endif
                                            <td>
                                                Mobile :{{ $item->contactno }}<br>
                                                Email :{{ $item->email }}<br>
                                                Address :{{ $item->presentaddress }}<br>
                                                facebook :{{ $item->fb_link }}<br>
                                                twitter :{{ $item->tw_link }}<br>
                                                linkedin:{{ $item->lin_link }}<br>
                                                instagram:{{ $item->ins_link }}<br>
                                            </td>
                                            <td>
                                                @if ($item->image)
                                                    <img height="50px" width="50px"
                                                        src="{{ asset('public/upload/' . $item->image) }}" alt="img">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->cv_upload)
                                                    <img height="50px" width="50px"
                                                        src="{{ asset('public/upload/' . $item->cv_upload) }}"
                                                        alt="img">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('teacher_list/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('teacher_list/' . $item->id) }}" method="POST">
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
