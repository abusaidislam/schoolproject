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
            width: 100%;
            padding: 10px;
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

        .stusearch {
            position: relative;
            width: 10%;
            float: right;
            margin-top: -50px;
        }
    </style>

    <section class="team-section">
        <div class="auto-container">
            <h1>Old Student<span class="normal-font theme_color"> List</span></h1>
            <input class="form-control stusearch" style="width:30%" type="search" name="search" id="search"
                placeholder="Student Search......."><br>
            <div class="row clearfix" id="search-results">
                @foreach ($data as $item)
                    <!--Column-->
                    <article class="column team-member col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInUp"
                        data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image"><a href="{{ url('student-profile-view/' . $item->id) }}">
                                    <img height="250px" src="{{ asset('public/upload/' . $item->studentimage) }}"
                                        alt=""
                                        @if (empty($item->studentimage)) src="{{ asset('/public/frontend_assets/images/background/default.png') }}" @endif></a>
                            </figure>

                            <div class="member-info">
                                <a href="{{ url('student-profile-view/' . $item->id) }}">
                                    <h3>Name: {{ $item->studentname }}</h3>
                                </a>
                                <div class="designation">Class: {{ $item->classname }}</div>
                            </div>
                            <div class="content">
                                <div class="text">
                                    {{-- <a href="{{ url('/member-profile/' . $item->id) }}"><button class="btn-sty">Profile --}}
                                    <a href="{{ url('student-profile-view/' . $item->id) }}">
                                        <button class="btn-sty">Profile View</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const teamMembers = document.querySelectorAll('.team-member');

        searchInput.addEventListener('keyup', function() {
            const query = searchInput.value.toLowerCase();

            teamMembers.forEach(function(member) {
                const name = member.querySelector('.member-info h3').textContent.toLowerCase();
                const className = member.querySelector('.designation').textContent
                    .toLowerCase();

                if (name.includes(query) || className.includes(query)) {
                    member.style.display = 'block';
                } else {
                    member.style.display = 'none';
                }
            });
        });
    });
</script>
