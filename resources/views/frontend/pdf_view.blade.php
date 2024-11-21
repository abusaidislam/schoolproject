@extends('layouts.master')
@section('content')
    <!--Page Title-->
    {{-- <section class="page-title"
        style="background-image:url('{{ asset('/public/frontend_assets/images/background/fff.jpg') }}');">

        <div class="auto-container">
            <div class="sec-title">
                <h1>What We Do</h1>
                <div class="bread-crumb"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('/what-we-do') }}"
                        class="current">What We Do</a>
                </div>
            </div>
        </div>
    </section> --}}

    <style>
        article.card1 {
            box-shadow: 0 4px 8px 10px rgba(86, 4, 4, 0.2);
            transition: 0.3s;
            width: 100%;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .card1:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }
    </style>

    {{-- <style>
        .title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: rgb(134, 224, 15);
            text-align: justify;
        }

        .content {
            color: white;
            text-align: justify;
        }

        .subtitle {
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
            color: white;
            text-align: justify;
        }

        .blob {
            width: 400px;
            position: absolute;
            top: 12%;
            left: 1%;
            z-index: -1;
        }

        .blob-2 {
            width: 250px;
            position: absolute;
            top: 45%;
            left: 65%;
            z-index: -1;
        }

        .glass-card {
            width: 80%;
            padding: 1.25rem;
            margin: auto;
            /* 	background: rgba(22, 37, 41, 0.7); */
            background: radial-gradient(circle at top right,
                    rgba(25, 83, 115, 0.7) 0,
                    rgba(25, 83, 115, 0.5) 100%);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.25);
            border-right: 1px solid rgba(152, 152, 152, 0.18);
            border-left: 1px solid rgba(43, 43, 43, 0.3);
            border-bottom: 1px solid rgba(43, 43, 43, 0.3);
            border-radius: 0.75rem;
        }
    </style> --}}

    <style>
        .box {
            width: 100%;
            height: 300px;
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            background-color: hsl(182, 25%, 30%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            perspective: 1500px;
            color: hsl(208, 100%, 88%);
            box-shadow: 9px 16px 20px 13px hsla(0, 0%, 0%, 0.25);
            transform: rotateX(0deg) rotateY(-12deg) rotateZ(4deg);
            animation: card 1.5s ease-in-out forwards infinite alternate;

            /* background-image:
                                                                                                                                                                                                                                                                                                                                                                                                    url(); */
        }

        @keyframes card {
            0% {
                border-top-left-radius: 0.3rem;
                border-bottom-right-radius: 0.3rem;
                border-top-right-radius: 5rem;
                border-bottom-left-radius: 5rem;
                transform: rotateX(0deg) rotateY(-12deg) rotateZ(5deg);
                color: black;
                background-color: hsl(182, 25%, 30%);
                color: hsl(0, 0%, 90%);
            }

            50% {
                border-top-left-radius: 5rem;
                border-bottom-right-radius: 5rem;
                border-top-right-radius: 0.3rem;
                border-bottom-left-radius: 0.3rem;
                color: hsl(0, 0%, 100%);
                background-color: hsl(182, 25%, 35%);
            }

            100% {
                border-top-left-radius: 0.3rem;
                border-bottom-right-radius: 0.3rem;
                border-top-right-radius: 5rem;
                border-bottom-left-radius: 5rem;
                transform: rotateX(0deg) rotateY(12deg) rotateZ(-5deg);
                color: black;
                background-color: hsl(182, 25%, 30%);
                color: hsl(208, 100%, 90%);
            }
        }
    </style>

    <style>
        .projcard-container {
            margin: 50px 0;
        }

        /* Actual Code: */
        .projcard-container,
        .projcard-container * {
            box-sizing: border-box;
        }

        .projcard-container {
            margin-left: auto;
            margin-right: auto;
            width: 1000px;
        }

        .projcard {
            margin-top: 20px;
            position: relative;
            width: 100%;
            height: 450px;
            margin-bottom: 40px;
            border-radius: 10px;
            background-color: #fff;
            border: 2px solid #ddd;
            font-size: 18px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 4px 21px -12px rgba(0, 0, 0, .66);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .projcard:hover {
            box-shadow: 0 34px 32px -33px rgba(0, 0, 0, .18);
            transform: translate(0px, -3px);
        }

        .projcard::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(-70deg, #424242, transparent 50%);
            opacity: 0.07;
        }

        .projcard:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #424242, transparent 50%);
        }

        .projcard-innerbox {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .projcard-img {
            position: absolute;
            height: 450px;
            width: 400px;
            top: 0;
            left: 0;
            transition: transform 0.2s ease;
        }

        .projcard:nth-child(2n) .projcard-img {
            left: initial;
            right: 0;
        }

        .projcard:hover .projcard-img {
            transform: scale(1.05) rotate(1deg);
        }

        .projcard:hover .projcard-bar {
            width: 70px;
        }

        .projcard-textbox {
            position: absolute;
            top: 7%;
            bottom: 7%;
            left: 430px;
            width: calc(100% - 470px);
            font-size: 17px;
        }

        .projcard:nth-child(2n) .projcard-textbox {
            left: initial;
            right: 430px;
        }

        .projcard-textbox::before,
        .projcard-textbox::after {
            content: "";
            position: absolute;
            display: block;
            background: #ff0000bb;
            background: #fff;
            top: -93%;
            left: -48px;
            height: 230%;
            width: 85px;
            transform: rotate(8deg);
        }

        .projcard:nth-child(2n) .projcard-textbox::before {
            display: none;
        }

        .projcard-textbox::after {
            display: none;
            left: initial;
            right: -55px;
        }

        .projcard:nth-child(2n) .projcard-textbox::after {
            display: block;
        }

        .projcard-textbox * {
            position: relative;
        }

        .projcard-title {
            font-family: 'Voces', 'Open Sans', arial, sans-serif;
            font-size: 24px;
        }

        .projcard-subtitle {
            font-family: 'Voces', 'Open Sans', arial, sans-serif;
            color: #888;
        }

        .projcard-bar {
            left: -2px;
            width: 50px;
            height: 5px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #424242;
            transition: width 0.2s ease;
        }

        .projcard-blue .projcard-bar {
            background-color: #0088FF;
        }

        .projcard-blue::before {
            background-image: linear-gradient(-70deg, #0088FF, transparent 50%);
        }

        .projcard-blue:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #0088FF, transparent 50%);
        }

        .projcard-red .projcard-bar {
            background-color: #D62F1F;
        }

        .projcard-red::before {
            background-image: linear-gradient(-70deg, #D62F1F, transparent 50%);
        }

        .projcard-red:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #D62F1F, transparent 50%);
        }

        .projcard-green .projcard-bar {
            background-color: #40BD00;
        }

        .projcard-green::before {
            background-image: linear-gradient(-70deg, #40BD00, transparent 50%);
        }

        .projcard-green:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #40BD00, transparent 50%);
        }

        .projcard-yellow .projcard-bar {
            background-color: #F5AF41;
        }

        .projcard-yellow::before {
            background-image: linear-gradient(-70deg, #F5AF41, transparent 50%);
        }

        .projcard-yellow:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #F5AF41, transparent 50%);
        }

        .projcard-orange .projcard-bar {
            background-color: #FF5722;
        }

        .projcard-orange::before {
            background-image: linear-gradient(-70deg, #FF5722, transparent 50%);
        }

        .projcard-orange:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #FF5722, transparent 50%);
        }

        .projcard-brown .projcard-bar {
            background-color: #C49863;
        }

        .projcard-brown::before {
            background-image: linear-gradient(-70deg, #C49863, transparent 50%);
        }

        .projcard-brown:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #C49863, transparent 50%);
        }

        .projcard-grey .projcard-bar {
            background-color: #424242;
        }

        .projcard-grey::before {
            background-image: linear-gradient(-70deg, #424242, transparent 50%);
        }

        .projcard-grey:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, #424242, transparent 50%);
        }

        .projcard-customcolor .projcard-bar {
            background-color: var(--projcard-color);
        }

        .projcard-customcolor::before {
            background-image: linear-gradient(-70deg, var(--projcard-color), transparent 50%);
        }

        .projcard-customcolor:nth-child(2n)::before {
            background-image: linear-gradient(-250deg, var(--projcard-color), transparent 50%);
        }

        .projcard-description {
            z-index: 10;
            font-size: 15px;
            color: #424242;
            height: 450px;
            overflow: hidden;
            /* text-overflow: ellipsis;
                text-overflow: ; */
        }
    </style>

    <!--Two Column Fluid -->
    <section class="container">
        <div class="outer clearfix">

            <object data='{{ asset('public/upload/' . $viewFile->image) }}' type="application/pdf" width="100%"
                height="678">

                <iframe src='{{ asset('public/upload/' . $viewFile->image) }}' width="80%" height="678">
                    <p>This browser does not support PDF!</p>
                </iframe>
            </object>

            {{-- <object data="document.pdf" type="application/pdf" width="100%" height="100%">
                <iframe src="document.pdf" width="100%" height="100%" style="border: none">
                    <p>
                        Your browser does not support PDFs.
                        <a href="document.pdf">Download the PDF</a>
                    </p>
                </iframe>
            </object> --}}


    </section>
@endsection
