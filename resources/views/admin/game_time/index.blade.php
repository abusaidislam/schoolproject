

@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Game Time</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Game Time Information</a></li>
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
                            <a href="{{ url('game-time/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Game Level</th>
                                        <th>Game Time(Minute)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                              @php
                                                    $categories = [
                                                        1 => 'Category A1-Special Category',
                                                        2 => 'Category A2-Special Category',
                                                        3 => 'Category B1-Level-1',
                                                        4 => 'Category B2-Level-1',
                                                        5 => 'Category C-Level-2',
                                                        6 => 'Category D-Level-3',
                                                        7 => 'Category E-Level-4',
                                                        8 => 'Category F-Level-5',
                                                        9 => 'Category G-Level-6',
                                                        10 => 'Category H-Level-7',
                                                        11 => 'Category I-Level-8',
                                                        12 => 'Flash Category'
                                                    ];
                                                @endphp
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $categories[$item->level] ?? '' }}</td>                          
                                            <td>{{ $item->game_time }} Minute</td>
                                           
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('game-time/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('game-time/' . $item->id) }}" method="POST">
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
