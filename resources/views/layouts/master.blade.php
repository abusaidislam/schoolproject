<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @php
        $basicInfo = DB::table('basic_infos')->where('id', 1)->first();
    @endphp
    <title>{{ $basicInfo->title }}</title>
    <link rel="icon" href="{{ asset('public/upload/' . $basicInfo->favIcon) }}">
    <link rel="stylesheet" href="{{ asset('public/frontend_assets/css/sweetalert2.min.css') }}">
    <script>
        const sweetAlertConfirmation = {
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        };
        const toastConfiguration = {
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        };
    </script>
</head>
@include('layouts.link')

<body >
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    @include('layouts.script')

</body>


</html>
