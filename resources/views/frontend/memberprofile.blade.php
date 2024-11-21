@extends('layouts.master')
@section('content')
  
    <!-- ==========Teacher Single Section Starts Here========== -->
    <section class="speaker-single-section pt-5 pb-5">
        <div class="container">
            <div class="teacher-wrapper">
                <div class="teacher-single-top">
                    <div class="teacher-single-item d-flex flex-wrap justify-content-between">
                        <div class="teacher-single-thumb">
                            <img src="{{ asset('public/upload/' . $singleProfile->image) }}" alt="teacher">
                        </div>
                        <div class="teacher-single-content">
                            <h4 class="title">{{$singleProfile->teachername}}</h4>
            
                            <h6 class="subtitle">Designation</h6>
                            <p class="header-p">{{$singleProfile->designation}}</p>
                            <h6 class="subtitle">Qualification</h6>
                            <p class="header-p">{{$singleProfile->eduqualification}}</p>
                            <ul>
                                <li class="d-flex flex-wrap justify-content-start">
                                    <span class="list-name">Adress</span>
                                    <span class="list-attr">{{$singleProfile->presentaddress}}</span>
                                </li>
                                <li class="d-flex flex-wrap justify-content-start">
                                    <span class="list-name">Email</span>
                                    <span class="list-attr">{{$singleProfile->email}}</span>
                                </li>
                                <li class="d-flex flex-wrap justify-content-start">
                                    <span class="list-name">Phone</span>
                                    <span class="list-attr">{{$singleProfile->contactno}}</span>
                                </li>
                                <li class="d-flex flex-wrap justify-content-start">
                                    <span class="list-name">Blood Group</span>
                                    <span class="list-attr">{{$singleProfile->bloodgroup}}</span>
                                </li>
                              
                            
                            </ul>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </section>
    <!-- ==========Teacher Single Section Ends Here========== -->
@endsection
