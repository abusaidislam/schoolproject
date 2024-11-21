@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$Gallary ?? ''}}</h3>
                      <p>Total Photos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-photo-film"></i>
                    </div>
                    <a href="{{url('gallary')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$Video ?? ''}}</h3>
      
                      <p>Total Videos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-video"></i>
                    </div>
                    <a href="{{url('video')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$MemberList ?? ''}}</h3>
      
                      <p>Total Teachers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-tie"></i>
                    </div>
                    <a href="{{url('teacher_list')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$StudentInformation ?? ''}}</h3>
      
                      <p>Total Students</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-graduate"></i>
                    </div>
                    <a href="{{url('student_info')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$contact ?? ""}}</h3>
      
                      <p>Total Message</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-message"></i>
                    </div>
                    <a href="{{url('message-list')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$FranchiseStore ?? ""}}</h3>
      
                      <p>Total Franchise </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <a href="{{url('franchise-list')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
             
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$Marketing ?? ""}}</h3>
      
                      <p>Total Marketing </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <a href="{{url('marketing')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
             
              </div>
          </section>
        </div>
    </div>
@endsection
