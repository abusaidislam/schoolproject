@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">Basic Info</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $basicInfo['title'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Banner Image</td>
                                        <td>
                                            <img src="{{ asset('public/upload/' . $basicInfo['favIcon']) }}" alt="logoimage"
                                                height="70" width="70">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            {{ $basicInfo['email'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            {{ $basicInfo['mobile'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            {{ $basicInfo['address'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Facebook Link</td>
                                        <td>{{ $basicInfo['fbLink'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Instragram Link</td>
                                        <td>{{ $basicInfo['instraLink'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Whats App Link</td>
                                        <td>{{ $basicInfo['whatsapp'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address Google Map Embed Code</td>
                                        <td>{{ $basicInfo['google'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>{{ $basicInfo['message'] }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div>
                                <a href="{{ url('basicinfo/' . $basicInfo['id'] . '/edit') }}">
                                    <button class="btn btn-info">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
