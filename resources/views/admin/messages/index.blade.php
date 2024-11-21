@extends('admin.master')
@section('content')
<section id="main-content">
<div class="card m-1 p-1">
    <h4>Orders Manage</h4>
    <div class="bootstrap-data-table-panel">
        <div class="table-responsive">
            <table id="example1" class="table table-striped table-bordered table-centre">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contacts</th>
                        <th>Subjects</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->contact }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->message }}</td>
                            <td>
                                @php
                                    $date = new DateTime($item->created_at);
                                    echo $date->format('Y/m/d h:i:s A') ;
                                @endphp
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    @if ($item->readStatus==0)
                                        <a href="{{ url('messageRead/'.$item->id.'/'.$item->readStatus) }}" class="btn btn-info">
                                            <i class="fa-sharp fa-solid fa-spinner"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('messageRead/'.$item->id.'/'.$item->readStatus) }}" class="btn btn-warning">
                                            <i class="fas fa-truck"></i>                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{url('message/'.$item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
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
</section>
@endsection


