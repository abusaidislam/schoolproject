@extends('admin.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">About Us</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">About Us Information</a></li>
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
                        <a href="{{ url('about/create') }}"class="btn btn-primary mb-3">Add New</a>
                        <table id="example1" class="table table-striped table-bordered table-centre">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tBody">
                                @foreach ($data as $item)
                                {{-- @php
                                    $content = DB::table('users')
                                @endphp --}}
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! $item->longDetails !!}</td>
                                       
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ url('about/'.$item->id.'/edit') }}" class="btn btn-info">
                                                <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ url('about/'.$item->id) }}" method="POST">
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
