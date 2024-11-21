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
            background: #2cbf07fa;
            padding: 10px;
            height: 100px;
            width: 340px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: center;
        }
        .a:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .a h4, .a h1 {
            margin: 0;
            color: white;
        }
        .a a {
            color: white;
            text-decoration: none;
        }
</style>
</head>
<body>

<div class="container mt-3">
    <div style="min-height: 500px">
        <h3 class="text-center"><span style="border-bottom: 3px solid black">Abacus Math Bangladesh Competition Game</span></h3><br>
        <div class="row">
            <div class="col-12 category">
                {{-- <div class="a special1">
                 <a href="{{url('/special-one')}}"><h1>Special One</h1></a>
                </div> --}}
                @foreach ($compitionCategory as $item)
                    <div class="a special1">
                        <a href="{{url($item->slug)}}"><h1>{{$item->title}}</h1></a>
                    </div>
                @endforeach
                {{-- <div class="a special2">
                    <a href="#"><h1>Special Two</h1></a>
                </div>
                <div class="a level1A">
                    <h1>Level 1A</h1>
                </div>
                <div class="a level1B">
                    <h1>Level 1B</h1>
                </div>
                <div class="a level2">
                    <h1>Level 2</h1>
                </div>
                <div class="a level3">
                    <h1>Level 3</h1>
                </div>
                <div class="a level4">
                    <h1>Level 4</h1>
                </div>
                <div class="a level5">
                    <h1>Level 5</h1>
                </div>
                <div class="a level6">
                    <h1>Level 6</h1>
                </div>
                <div class="a level7">
                    <h1>Level 7</h1>
                </div>
                <div class="a level8">
                    <h1>Level 8</h1>
                </div> --}}
            </div>
        </div>
    </div>
    <footer class="mt-5">
        {{-- <button type="button" class="btn btn-primary px-4 mb-2" data-bs-toggle="modal" data-bs-target="#historyModal">History</button>
        <button type="button" class="btn btn-secondary px-4 mb-2" data-bs-toggle="modal" data-bs-target="#resultModal">Result</button>
        <button type="button" class="btn btn-dark px-4 mb-2" data-bs-toggle="modal" data-bs-target="#myModal">Option</button> --}}
        <a href="{{url('/')}}"> <button type="button" class="btn btn-danger px-4 mb-2">Exit</button></a>
    </footer>

</div>


<script>
    
</script>
</body>
</html>





