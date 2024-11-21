<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- @php
        $basicInfo = DB::table('basic_infos')->where('id', 1)->first();
    @endphp --}}
    {{-- <title>{{ $basicInfo->title }}</title> --}}
</head>
{{-- <link rel="icon" href="{{ asset('public/upload/' . $BasicInfo->favIcon) }}"> --}}
@include('layouts.link')

<body>

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')


    <script src="{{ asset('public/frontend_assets/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/plugins.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/progress.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/odometer.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/nice-select.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/slick.min.js') }}"></script>
    <script src="{{ asset('public/frontend_assets//js/main.js') }}"></script>
</body>


</html>
