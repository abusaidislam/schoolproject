@extends('layouts.master')
@section('content')
    <style>
        .inner-box {
            box-shadow: 0 4px 8px 2px rgba(51, 54, 51, 0.2);
            padding: 5px;
            border-radius: 5px;
        }

        .member-info {
            margin-left: 5px;
        }

        .btn-sty {
            box-shadow: 0 4px 8px 0 rgba(129, 131, 128, 0.2);
            transition: 0.3s;
            width: 44%;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 5px;
            color: rgb(12, 10, 12);
            text-align: center;
        }

        .btn-sty:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .social-links {
            text-align: center;
        }

        .text {
            text-align: center;
        }
    </style>

    <section class="team-section">
        <div class="auto-container">
            <h1>Teacher<span class="normal-font theme_color"> List</span></h1> <br>
            <div class="row clearfix">
                @foreach ($teacherList as $item)
                    <!--Column-->
                    <article class="column team-member col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image"><a href="{{ url('profile-view/' . $item->id) }}"><img height="250px"
                                        src="{{ asset('public/upload/' . $item->image) }}" alt=""
                                        @if (empty($item->image)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif /></a>
                            </figure>

                            <div class="member-info">
                                <a href="{{ url('profile-view/' . $item->id) }}">
                                    <h3> Name: {{ $item->teachername }}</h3>
                                </a>
                                @php
                                    $designation = DB::table('member_categories')
                                    ->where('id', '=', $item->designation)
                                    ->first();
                                @endphp
                                <div class="designation">Designation:
                                    @if ($designation)
                                        {{ $designation->title }}
                                    @endif
                                </div>
                            </div>
                            <div class="content">
                                <div class="text">
                                    {{-- <a href="{{ url('/member-profile/' . $item->id) }}"><button class="btn-sty">Profile --}}
                                    <a href="{{ url('profile-view/' . $item->id) }}">
                                        <button class="btn-sty">Profile View</button>
                                    </a>

                                    <a href="{{ asset('public/upload/' . $item->cv_upload) }}" download> <button
                                            class="btn-sty">Download CV </a></button>

                                </div>
                                <div class="social-links">
                                    <a href="{{ $item->fb_link }}"><img src="{{ asset('public/image/facebook.png') }}" alt="Facebook" width="100%"></a>
                                    <a href="{{ $item->tw_link }}"><img src="{{ asset('public/image/twitter.png') }}" alt="Twitter" width="100%"></a>
                                    <a href="{{ $item->lin_link }}"><img src="{{ asset('public/image/md_5aeedf9306a0c.png') }}" alt="L" width="100%"></a>
                                    <a href="{{ $item->ins_link }}"><img src="{{ asset('public/image/Instagram.png') }}" alt="Instagram" width="100%"></a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>
@endsection
