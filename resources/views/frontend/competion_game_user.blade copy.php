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
    .category {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            box-sizing: border-box;
        }
    .a {
      background: #ffb74d; /* Vibrant color */
      padding: 15px;
      height: 150px;
      width: 340px;
      margin: 15px;
      border-radius: 15px;
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: center;
      font-family: 'Comic Sans MS', cursive, sans-serif; /* Playful font */
      display: flex;
      justify-content: center; /* Centers horizontally */
      align-items: center;    /* Centers vertically */
  }


    .a:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }
    .a h1 {
        margin: 0;
        color: white;
        font-size: 2em;
    }
    .a.disabled {
        background: #bdbdbd;
        pointer-events: none; /* Disable click */
        cursor: not-allowed;
    }
    .a a {
        color: white;
        text-decoration: none;
    }
    .status-btn {
        font-size: 18px;
        padding: 10px 10px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>
  <div class="container-fluid mt-3">
    <div style="min-height: 400px">
        {{-- <h3 class="text-center"><span style="border-bottom: 3px solid black">Abacus Math Bangladesh Competition Game</span></h3><br> --}}

        <div class="row">
            @if ($admissionLogin->status == 'Pending')
                <h4 class="text-end text-white">
                    <span class="btn btn-danger status-btn">{{$admissionLogin->status}}</span>
                </h4>
            @else
                <h4 class="text-end">
                    <span class="btn btn-success status-btn">{{$admissionLogin->status}}</span>
                </h4>
            @endif

            <div class="col-12 category" style="display: flex; justify-content:center">
                <!-- Disable the category link if the status is pending -->
                <div class="a special1 {{ $admissionLogin->status == 'Pending' ? 'disabled' : '' }}">
                    @if ($admissionLogin->status == 'Approved')
                          <a href="{{ url('/special-two/' . $admissionLogin->id) }}">
                            <h1>Special Category</h1>
                        </a>
                    @else
                        <h1>Special Category</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <footer class="mt-5" style="display: flex; justify-content:center">
        <a href="{{url('/')}}"> 
            <button type="button" class="btn btn-danger px-4 mb-2">Exit</button>
        </a>
    </footer>
</div>


<script>
    
</script>
</body>
</html>






