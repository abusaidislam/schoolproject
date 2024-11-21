@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Franchise List</h1>
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
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Client Name</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Email Address</th>
                                        <th>Center Name</th>
                                        <th>Interested</th>
                                        <th>About Us</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                     
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->mobile_no }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @php
                                                    $centerData = json_decode($item->center, true);
                                                @endphp
                                                @if(is_array($centerData))
                                                    @foreach ($centerData as $center)
                                                        <span>{{ $center }}</span> ,
                                                    @endforeach
                                                @else
                                                    {{ $centerData }}
                                                @endif
                                            </td>
                                            <td>{{ $item->interested }}</td>
                                            <td>{{ $item->about_us }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                  
                                                    <form action="{{ url('franchise-list/' . $item->id) }}" method="POST">
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
