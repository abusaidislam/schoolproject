@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Competition Category Level 5</h1>
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
                            <a href="{{ url('competition-category-level5/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Digit Length1</th>
                                        <th>Digit Length2</th>
                                        <th>Number Row</th>
                                        <th>Number Display</th>
                                        <th>Number Conditon</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->num_length1 }}</td>
                                            <td>{{ $item->num_length2 }}</td>
                                            <td>{{ $item->num_row }}</td>
                                            <td>{{ $item->num_display }}</td>
                                            <td>{{ $item->num_condition }}</td>
                                            @if ($item->type == 'plus')
                                              <td>Addition / Subtraction</td>
                                            @elseif($item->type == 'multiply')
                                             <td>Multiplication</td>
                                            @else
                                                <td>Division</td>
                                            @endif
                                  
                                            <td>{{ $item->status == 0 ? 'Active' : 'InActive' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('competition-category-level5/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('competition-category-level5/' . $item->id) }}" method="POST">
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