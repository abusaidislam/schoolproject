@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Flash Competition</h1>
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
                            <a href="{{ url('flash-competition-category/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Level Name</th>
                                        <th>Number of Digits</th>
                                        <th>Number of Row</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if ($item->category == 1)
                                                <td>Level-1</td>
                                            @elseif($item->category == 2)
                                                <td>Level-2</td>
                                            @elseif($item->category == 3)
                                                <td>Level-3</td>
                                            @elseif($item->category == 4)
                                                <td>Level-4</td>
                                            @elseif($item->category == 5)
                                                <td>Level-5</td>
                                            @elseif($item->category == 6)
                                                <td>Level-6</td>
                                            @elseif($item->category == 7)
                                                <td>Level-7</td>
                                            @elseif($item->category == 8)
                                                <td>Level-8</td>
                                            @elseif($item->category == 9)
                                                <td>Level-9</td>
                                            @else
                                                <td>Level-10</td>
                                            @endif
                                           
                                            <td>{{ $item->num_length }}</td>
                                            <td>{{ $item->num_row }}</td>
                                            <td>{{ $item->num_display }}</td>
                                            <td>{{ $item->status == 0 ? 'Active' : 'InActive' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('flash-competition-category/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('flash-competition-category/' . $item->id) }}" method="POST">
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
