@extends('layouts.master')
@section('content')
    <style>
        #classname {
            color: #609513;
            font-size: 20px;
            text-decoration: underline;
        }

        #classname:hover {
            color: DodgerBlue;
            text-decoration: underline;
        }
    </style>
    <section class="container">
        <div class="outer clearfix">
            <div class="projcard1 projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="{{ asset('public/upload/' . $BasicInfo->favIcon) }}"
                        @if (empty($BasicInfo->favIcon)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Class & Section List</div>
                        <div class="projcard-bar"></div>
                        <div class="projcard-description text-justify">
                            <ul>
                                @foreach ($className as $item)
                                    <li style="padding: 0%;margin:0%;"><a id="classname"
                                            href="{{ url('students/' . $item->id) }}"><img
                                                src="{{ asset('/public/image/rightarrow.png') }}"
                                                width="7%" />{{ $item->className }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
