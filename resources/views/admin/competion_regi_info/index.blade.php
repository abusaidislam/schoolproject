@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Competion Registration Info</h1>
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
                            <a href="{{ url('compition-regi-info/create') }}"class="btn btn-primary mb-3">Add New</a>
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>User Info</th>
                                        <th>Transation Id</th>
                                        <th>Phone Numebr</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                       
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                               Name: {{ $item->student_fullName }} <br>
                                               Gander: {{ $item->gender }} <br>
                                               Father Name: {{ $item->father_name }} <br>
                                               Father Phone: {{ $item->father_contactno }} <br>
                                               Mother Name: {{ $item->mother_name }} <br>
                                               Data of Birth: {{ $item->dateofbirth }} <br>
                                               Address: {{ $item->present_address }} <br>
                                               @if ($item->level_name == 1 )
                                                 <span class="bg-warning p-1">  Game Level: Special Category A1 </span><br>
                                               @elseif($item->level_name == 2)
                                                 <span class="bg-warning p-1">  Game Level: Special Category A2 </span><br>
                                               @elseif($item->level_name == 3)
                                                 <span class="bg-warning p-1">  Game Level: Category B1 Level 1 </span><br>
                                               @elseif($item->level_name == 4)
                                                 <span class="bg-warning p-1">  Game Level: Category B2 Level 1 </span><br>
                                               @elseif($item->level_name == 5)
                                                 <span class="bg-warning p-1">  Game Level: Category C Level 2 </span><br>
                                               @elseif($item->level_name == 6)
                                                 <span class="bg-warning p-1">  Game Level: Category D Level 3 </span><br>
                                               @elseif($item->level_name == 7)
                                                 <span class="bg-warning p-1">  Game Level: Category E Level 4 </span><br>
                                               @elseif($item->level_name == 8)
                                                 <span class="bg-warning p-1">  Game Level: Category F Level 5 </span><br>
                                               @elseif($item->level_name == 9)
                                                 <span class="bg-warning p-1">  Game Level: Category G Level 6 </span><br>
                                               @elseif($item->level_name == 10)
                                                 <span class="bg-warning p-1">  Game Level: Category H Level 7 </span><br>
                                               @elseif($item->level_name == 11)
                                                 <span class="bg-warning p-1">  Game Level: Category I Level 8 </span><br>
                                               @else
                                                   
                                               @endif
                                            </td>
                                          
                                            <td>{{ $item->transation_id }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->text_password }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        {{$item->status}} <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item update-status" href="#" data-id="{{ $item->id }}" data-status="Pending">Pending</a>
                                                        <a class="dropdown-item update-status" href="#" data-id="{{ $item->id }}" data-status="Approved">Approved</a>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('compition-regi-info/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('compition-regi-info/' . $item->id) }}" method="POST">
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
@section('script')
<script>
$(document).ready(function() {
    // Get the CSRF token from the meta tag
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    // When a dropdown item is clicked
    $('.update-status').on('click', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        var status = $(this).data('status');
        
        // Find the button inside the same dropdown
        var $dropdownButton = $(this).closest('.btn-group').find('button');

        $.ajax({
            url: '{{ route("regi.update.status") }}', // Use Laravel route helper
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    $dropdownButton.text(status);
                } else {
                    
                }
            },
           
        });
    });
});

</script>
@endsection
