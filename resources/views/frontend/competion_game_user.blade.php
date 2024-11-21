<!DOCTYPE html>
<html lang="en">
<head>
  <title>Abacus Math Bangladesh Competition Game</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- <link rel="stylesheet" href="{{asset('public/abacus_app_assets/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('public/abacus_app_assets/style.css')}}">
  {{-- <script src="{{ asset('public/abacus_app_assets/bootstrap.bundle.min.js') }}"></script> --}}
  <script src="{{ asset('public/abacus_app_assets/jquery-3.6.0.min.js') }}"></script>
  <style>
    body{
        /* background: linear-gradient(95deg, #b2f5e8, #f1feff);  */
     
    }
    .category {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        min-height: 450px; /* Centering vertically */
        border-radius: 15px;
        padding: 20px;
    }

    .a, .a2 {
        padding: 15px;
        height: 180px;
        width: 350px;
        margin: 20px;
        border-radius: 20px;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .a {
        background: #ff8c00;
    }

    .a2 {
        background: #20c997;
    }

    .a:hover, .a2:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .a h1, .a2 h1 {
        margin: 0;
        color: white;
        font-size: 2.2em;
    }

    .a.disabled, .a2.disabled {
        background: #bdbdbd;
        pointer-events: none;
        cursor: not-allowed;
    }

    .a a, .a2 a {
        color: white;
        text-decoration: none;
    }

    .status-btn {
    font-size: 18px;
    padding: 12px 30px; /* Larger padding for a more prominent look */
    border-radius: 30px; /* More rounded corners */
    background-color: #ff6f61; /* Bright coral-like color */
    color: white;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* Stronger shadow for depth */
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s; /* Smooth transitions */
    font-family: 'Comic Sans MS', cursive, sans-serif; /* Playful font */
}

.logout-link {
    color: white;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
}

.status-btn:hover {
    background-color: #ff8b75; /* Slightly lighter coral on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
    transform: translateY(-5px); /* Subtle lift effect */
    cursor: pointer;
}

.logout-link:hover {
    text-decoration: none;
    color: white; /* Ensure consistent white text color */
}

.status-btn:active {
    background-color: #ff4d3a; /* Darker shade on click */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25); /* Stronger shadow on click */
    transform: translateY(0); /* Reset lift effect on click */
}


</style>
</head>
<body style="background-image: url('{{ asset('public/frontend_assets/images/banner/gameback.webp') }}');background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="container-fluid mt-3">
        <div class="row">
            
            @if ($admissionLogin->status == 'Pending')
                <h4 class="text-end text-white">
                    <span class="btn btn-danger status-btn">{{$admissionLogin->status}}</span>
                </h4>
            @else
                <h4 class="text-end">
                    <a href="{{url('competition-logout')}}"> <span class="btn  status-btn">Logout</span></a>
                </h4>
            @endif
            @if (isset($message))
                <p class="alert alert-danger text-center text-danger" >
                    {{ $message }}
                </p> <br>
            @endif
            <span class="message"></span>
            <div class="col-12 category">
      
                @if ($admissionLogin->status == 'Approved')
                        @if ($admissionLogin->student_type == 'Yes')
                            <div class="a special1">
                                <a href="{{ url('/visual-competition/' . $admissionLogin->id) }}">
                                    <h1>Visual Competition</h1>
                                </a>
                            </div>
                            <div class="a2 special2">
                                <a href="{{ url('/flash-competition/' . $admissionLogin->id) }}">
                                    <h1>Flash Competition</h1>
                                </a>
                            </div>
                        @else
                        <div class="a special1">
                            <a href="{{ url('/visual-competition/' . $admissionLogin->id) }}">
                                <h1>Visual Competition</h1>
                            </a>
                        </div>
                        @endif
                @else
                    <div class="a special1 disabled">
                        <h1>Visual Competition</h1>
                    </div>
                    <div class="a2 special2 disabled">
                        <h1>Flash Competition</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>






