@extends('layouts.master')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i');
body{
  font-family: 'Muli', sans-serif;
  background:#ddd;
}

.wsk-cp-product{
  background:#fff;
  padding:15px;
  border-radius:6px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  position:relative;
  margin:20px auto;
  min-height: 540px;
}
.wsk-cp-img{
  position:absolute;
  top:5px;
  left:50%;
  transform:translate(-50%);
  -webkit-transform:translate(-50%);
  -ms-transform:translate(-50%);
  -moz-transform:translate(-50%);
  -o-transform:translate(-50%);
  -khtml-transform:translate(-50%);
  width: 100%;
  padding: 15px;
  transition: all 0.2s ease-in-out;
}
.wsk-cp-img img{
  width:100%;
  height: 210px;
  transition: all 0.2s ease-in-out;
  border-radius:6px;
}
.wsk-cp-product:hover .wsk-cp-img{
  top:-40px;
}
.wsk-cp-product:hover .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
.wsk-cp-text{
  padding-top:100%;
}

.wsk-cp-text .title-product{
  text-align:center;
}
.wsk-cp-text .title-product h3{
  font-size:20px;
  font-weight:bold;
  margin:15px auto;
  overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  width:100%;
}
.wsk-cp-text .description-prod p{
  margin:0;
}
/* Truncate */
.wsk-cp-text .description-prod {
  text-align:justify;
  width: 100%;
  display: block;
  margin-bottom: 15px;
}

.red{
  color:#F44336;
  font-size:22px;
  display:inline-block;
  margin: 0 5px;
}
@media screen and (max-width: 991px) {
  .wsk-cp-product{
    margin:40px auto;
  }
  .wsk-cp-product .wsk-cp-img{
  top:-40px;
}
.wsk-cp-product .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}


}
</style>
    <!-- ==========About Section Starts Here========== -->
    <section class="about-section pos-rel p-5" style="background:rgb(208 251 255 / 61%);" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h3 class="title">Our Centre List</h3>
                    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search Centre Name....." title="Type in a Text">

                    </div>
                </div>
            </div>
          

            <div class="row" id="trainingContainer">
                <div class="container">
                    <div class="row"  >
                    @foreach($traningInfo as $index => $item)
                        <div class="col-md-3">
                            <div class="wsk-cp-product feature-item">
                            <div class="wsk-cp-img">
                                <img src="{{ asset('public/upload/' . $item->image) }}" alt="Product" class="img-responsive" /></div>
                            <div class="wsk-cp-text">
                                
                                <div class="title-product">
                                <h3>{{$item->title}}</h3>
                                </div>
                                <div class="description-prod">
                                <p>{!! $item->longDetails !!}</p>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
     
    </section>
    <!-- ==========About Section Ends Here========== -->

    <!-- ==========Faqs Section Ends Here========== -->

@endsection

<script>
    function myFunction() {
        // Declare variables
        var input, filter, container, items, title, i, txtValue;
        input = document.getElementById('mySearch');
        filter = input.value.toLowerCase();
        container = document.getElementById('trainingContainer');
        items = container.getElementsByClassName('feature-item');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < items.length; i++) {
            title = items[i].getElementsByClassName("title-product")[0];
            txtValue = title.textContent || title.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                items[i].style.display = "";
            } else {
                items[i].style.display = "none";
            }
        }
    }
</script>