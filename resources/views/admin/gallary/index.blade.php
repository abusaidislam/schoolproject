@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gallary</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Gallary Information</a></li>
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
                            <a href="{{ url('gallary/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Albume Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        @php
                                            $albumes_name = DB::table('albumes')
                                                ->where('id', '=', $item->albume_type)
                                                ->first();

                                            $activities = DB::table('activities')
                                                ->where('id', '=', $item->photStatus)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if ($albumes_name)
                                                <td>{{ $albumes_name->alName }}</td>
                                            @else
                                                <td>Albumes Not Found</td>
                                            @endif
                                            <td>{{ $item->title }}</td>

                                            <td>
                                                @if ($item->image)
                                                <img height="50px" width="50px"
                                                src="{{ asset('public/upload/' . $item->image) }}" alt="img">
                                                @endif
                                            </td>
                                            @if ($activities)
                                                <td>{{ $activities->actType }}</td>
                                            @else
                                                <td>Category Not Found</td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('gallary/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('gallary/' . $item->id) }}" method="POST">
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