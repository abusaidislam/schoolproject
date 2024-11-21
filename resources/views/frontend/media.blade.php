@extends('layouts.master')
@section('content')
    <!--Page Title-->
    <section class="container">
        <div class="outer clearfix">
            @foreach ($media as $item)
                {{-- @dd($item); --}}
                <div class="projcard1 projcard-blue">
                    <div class="projcard-innerbox">
                        <img class="projcard-img" src="{{ asset('public/upload/' . $item->image) }}"
                            @if (empty($item->image)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif />
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $item->title }}</div>
                            <div class="projcard-bar"></div>
                            <div class="projcard-description text-justify">
                                <p>{!! $item->longDetails !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </section>
@endsection
