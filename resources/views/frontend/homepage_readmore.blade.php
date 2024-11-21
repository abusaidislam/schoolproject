@extends('layouts.master')
@section('content')
    <!--Team Section-->
    <style>
        .profiledesign {
            box-shadow: 0 4px 8px 10px rgba(51, 54, 51, 0.2);
            padding: 5px;
            border-radius: 5px;
            width: 900px;
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

        .image-column img {
            height: 350px;
            margin: auto;
        }


        @media (max-width: 768px) {
            * {
                box-sizing: border-box;
            }

            .profiledesign {
                box-shadow: 0 4px 8px 10px rgba(51, 54, 51, 0.2);
                padding: 5px;
                border-radius: 5px;
                width: 95%;

            }

            .team-section {
                margin-top: -70px;
                margin-bottom: -40px;
            }

            .btn-sty {
                box-shadow: 0 4px 8px 0 rgba(129, 131, 128, 0.2);
                transition: 0.3s;
                width: 100%;
                padding: 10px;
                margin-left: -10px;
            }

            .content-column {
                margin-top: -20px;
            }
            }
    </style>
    <section class="team-section member-details">
        <div class="auto-container">

            <!--Column-->
            <article class="column team-member">
                <div class="inner-box profiledesign">
                    <div class="row clearfix">
                        <div class="column image-column col-lg-5 col-md-3 col-sm-3 col-xs-12">
                            <figure class="image">
                                <a href=""><img class="img-responsive"
                                        src="{{ asset('public/upload/' . $readMore->image) }}" alt=""
                                        @if (empty($readMore->image)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif /></a>
                            </figure>
                        </div>

                        <div class="column content-column col-lg-7 col-md-5 col-sm-9 col-xs-12">
                            <div class="member-info padd-bott-10" style="margin-top: 20px">

                                <h3>
                                    {{ $readMore->title }}
                                </h3>

                                <div class="designation text-justify" style="padding: 10px; color:rgb(18, 13, 13)">
                                    {!! $readMore->longDetails !!}</div>
                            </div>


                            <div class="content">
                                {{-- <ul class="info-list text">
                                    <li><strong>Profession:</strong>{{ $partnersview->profession }}</li>
                                    <li><strong>Mobile:</strong>{{ $partnersview->mobile }}</li>
                                    <li><strong>Email:</strong>{{ $partnersview->email }}</li>
                                    <li><strong>Address:</strong>{{ $partnersview->address }}</li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
