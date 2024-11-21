@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="outer clearfix">
            @foreach ($downlodeCorner as $item)
                <div class="projcard1 projcard-blue">
                    <div class="projcard-innerbox">
                        @if (pathinfo($item->image, PATHINFO_EXTENSION) == 'pdf')
                            <!-- Display the PDF file using an iframe -->
                            <iframe src="{{ asset('public/upload/' . $item->image) }}" width="30%" height="400px"></iframe>
                        @else
                            <!-- Display the image -->
                            <img class="projcard-img" src="{{ asset('public/upload/' . $item->image) }}"
                                @if (empty($item->image)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif />
                        @endif
                        <div class="projcard-textbox">
                            <div class="projcard-title">
                                {{ $item->title }}
                                @if ($item->doumentfile=='')
                                    {{''}}
                                @else
                                    <a download href="{{ url('public/upload/' . $item->doumentfile) }}"><button>Download
                                    </button></a>
                                @endif
                            </div>
                            <div class="projcard-bar"></div>
                            <div class="projcard-description text-justify"><p>{!! $item->longDetails !!}</p></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
