@extends('admin.master')
@section('content')
    <div class="content-header">
        <h4 class="text-success text-center">{{ Session::get('massage') }}</h4>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Flash Competition Group-A Result</h1>
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
                            {{-- <a href="{{ url('special-category-result/create') }}"class="btn btn-primary mb-3">Add New</a> --}}
                            <table id="example1" class="table table-striped table-bordered table-centre">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th>Age</th>
                                        {{-- <th>Address</th> --}}
                                        <th>Category</th>
                                        <th>Game Time</th>
                                        <th>Right Answer</th>
                                        <th>Wrong Answer</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($data as $item)
                                    @php
                                          $statusLabel = '';
                                            switch ($item->status) {
                                                case 0:
                                                    $statusLabel = 'Status';
                                                    break;
                                                case 1:
                                                    $statusLabel = 'Champion';
                                                    break;
                                                case 2:
                                                    $statusLabel = '1st Runner Up';
                                                    break;
                                                case 3:
                                                    $statusLabel = '2nd Runner Up';
                                                    break;
                                                default:
                                                    $statusLabel = 'Merit';
                                                    break;
                                            }
                                    @endphp         
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->userInfo->student_fullName ?? ' ' }}</td>
                                        <td>{{ $item->userInfo->phone_number ?? ' ' }}</td>
                                        <td>{{ $item->userInfo->dateofbirth ?? ' ' }}</td>
                                        <td>
                                            @if ($item->userInfo && $item->userInfo->ageInYears !== null)
                                                {{ $item->userInfo->ageInYears }} years, {{ $item->userInfo->ageInMonths }} months, {{ $item->userInfo->ageInDays }} days
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        {{-- <td>{{ $item->userInfo->present_address ?? ' ' }}</td> --}}
                                        <td>
                                               <span class="bg-warning p-2"> Group-A</span>
                                         
                                        </td>
                                        <td>{{ $item->game_time }}</td>
                                        <td>{{ $item->right_ans }}</td>
                                        <td>{{ $item->rong_ans }}</td>
                                        <td>{{ $item->right_ans }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="status-button-{{ $item->id }}">
                                                    {{ $statusLabel }}
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item update-status" data-status="0" data-id="{{ $item->id }}" href="#">Status</a>
                                                    <a class="dropdown-item update-status" data-status="1" data-id="{{ $item->id }}" href="#">Champion</a>
                                                    <a class="dropdown-item update-status" data-status="2" data-id="{{ $item->id }}" href="#">1st Runner Up</a>
                                                    <a class="dropdown-item update-status" data-status="3" data-id="{{ $item->id }}" href="#">2nd Runner Up</a>
                                                    <a class="dropdown-item update-status" data-status="4" data-id="{{ $item->id }}" href="#">Merit</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{-- <a href="{{ url('flash-group-a-result/' . $item->id . '/edit') }}" class="btn btn-info">
                                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                </a> --}}
                                                <form action="{{ url('flash-group-a-result/' . $item->id) }}" method="POST">
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
    $('.update-status').click(function(e) {
        e.preventDefault();

        var newStatus = $(this).data('status'); // Selected status
        var itemId = $(this).data('id');        // Selected item ID
        var statusLabel = $(this).text().trim(); // Get the text of the selected status

        $.ajax({
            url: "{{ route('flash.result.status') }}", // Your route for updating the result
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                status: newStatus, // Use the correct variable name here
                id: itemId
            },
            success: function(response) {
                if (response.success) {
                    alert('Result updated successfully!');
                    $('#status-button-' + itemId).text(statusLabel); // Update the button text
                } else {
                    alert('Failed to update Result.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred while updating the status.');
            }
        });
    });
});

</script>
@endsection