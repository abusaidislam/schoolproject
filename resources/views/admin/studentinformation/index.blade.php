@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Information List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student Information List</a></li>
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
                            <div class="row pt-3">
                                <div class="col-2">
                                    <a href="{{ url('student_info/create') }}"class="btn btn-primary mb-3">Add New</a>
                                </div>
                                <style>
                                    .addmission a { color:#FF0000; font-size:18px; font-weight:bold; padding-right:40px; font-size:22px; font-family:"Times New Roman", Times, serif; } .addmission a:hover { color:#9b0505; text-decoration:none; }.padding { padding:5px 0px; } .srctext { padding:0px; font-family:"Times New Roman", Times, serif; font-weight:bold; color:#666666; font-size:18px; } .srctext2 { padding:0px; } .pendingbtn { padding:3px 5px;} .srctext3 { border:1px solid #000066;}
                                </style>

                                <div class="col-10" style="text-align: right;">
                                    <span class="addmission"><a href="{{ url('student_peninfo') }}" >Pending Admission ({{ $pendinglist }})</a></span>
                                </div>
                            </div>


                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Student Name</th>
                                        <th>Contact No.</th>
                                        <th>Course Name</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->student_fullName }}</td>
                                            <td>{{ $item->contactno }}</td>
                                            <td>{{ $item->course }}</td>
                                            <td>{{ $item->presentaddress }}</td>
                                            <td>
                                                <span class="status-label" data-id="{{ $item->id }}"
                                                    data-status="{{ $item->status }}"
                                                    style="color: {{ $item->status == 2 ? 'red' : 'green' }}">
                                                    {{ $item->status == 2 ? 'Inactive' : 'Active' }}
                                                </span>
                                                <button class="update-status-btn btn btn-info p-0"
                                                    data-id="{{ $item->id }}">Update</button>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('student_info/' . $item->id . '/edit') }}"
                                                        class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('student_info/' . $item->id) }}" method="POST">
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



    $('.update-status-btn').on('click', function() {
        var btn = $(this);
        var recordId = btn.data('id');
        var currentStatus = btn.siblings('.status-label').data('status');
        var newStatus = currentStatus === 1 ? 2 : 1;
        console.log(newStatus);
        $.ajax({
            type: 'POST',
            url: 'student_peninfo_status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: recordId,
                status: newStatus
            },
            success: function(response) {
                btn.siblings('.status-label').data('status', newStatus);
                btn.siblings('.status-label').text(newStatus === 2 ? 'Inactive' : 'Active');
                btn.siblings('.status-label').css('color', newStatus === 2 ? 'red' : 'green');
            },
            error: function(error) {
                console.log('Error updating status:', error);
            }
        });
    });
});

</script>
@endsection
