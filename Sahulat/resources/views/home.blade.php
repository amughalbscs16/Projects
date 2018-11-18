@extends('layouts.master')
@section('css')
<style type="text/css">
  .container-1,.container-2,.container-3{
    box-shadow: 0px 0px 10px rgb(0,0,0);
    background-color: rgba(0,0,0,0.05);
    margin-top:3%;
    border-radius: 10px;
  }
  .container-1 .card{
    margin-left: 5%;
  }
  .container-2 .card{
    margin-left: 1%;
  }
  #row{
    margin-left: 3%;
  }
  .next{
    width: 5%;
    height: 5%;
  }
  #row{
    margin-bottom: 3%;
    padding-left: 5%;
  }
  .card{
    position: relative;
    margin: 5% 0% 5% 0%;
  }
  .card img{
    position: relative;
    border: 0px solid black;
    width: 100%;
    height: 250px;
    border-radius: 10%;
    /*background-color: white;*/
  }
  .card:hover{
    transform: scale(1.2);
  }
  .clear{
    clear: both;
  }
  .overlay{
    border-radius: 5px;
    position: absolute;
    width: 100%;
    bottom: 0px;
    color: white;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
  }
  .overlay span{
    border-radius: 5px;
    padding: 5%;
    font-size: 10px;
    font-weight: bold;
    background-color: black;
  }
  .overlay{
    opacity: 0;
  }
  h1,h3{
    text-align: center;
    color: black;
  }
  #pagedata .overlay:hover{
    box-shadow: 0px 10px 0px black;
    opacity: 1;
  }
  .container-3 .card{
    margin-left: 5%;
  }
  .container-3 .card:hover img{
    background: rgba(128,128,128,0.2);
  }

@media only screen and (min-width: 401px) and (max-width: 800px){
.card img{
  width: 70%;
  height: 150px;
}
}
@media only screen and (max-width: 400px) {
.card img{
  width: 50%;
  height: 120px;
}
#row{
  margin-left: 20%;
}
.container-3 .card{
  margin-left: 0%;
}
.container-3 .card img{
  width: 50%;
}
}
</style>
@endsection
@section('bodytitle')
Search for Desired Service in Your Area
@endsection
@section('content')
<div class="col-12 col-m-12 col-t-12 left container-1">
        <h1 class="col-12 col-m-12 col-t-12 left">Trending</h1><span class="clear"></span>
        <div id="row" class="col-12 col-m-12 col-t-12 left">
          @if ($count>0)
          <a href="{{route('get'.$services[0]->name.'Profile',['service_id'=>$services[0]->service_id,'provider_id'=>$services[0]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[0]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[0]->name}}</span>
              <span class="right">Rating:{{$services[0]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count>1)
          <a href="{{route('get'.$services[1]->name.'Profile',['service_id'=>$services[1]->service_id,'provider_id'=>$services[1]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[1]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[1]->name}}</span>
              <span class="right">Rating:{{$services[1]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count>2)
          <a href="{{route('get'.$services[2]->name.'Profile',['service_id'=>$services[2]->service_id,'provider_id'=>$services[2]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[2]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[2]->name}}</span>
              <span class="right">Rating:{{$services[2]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count>3)
          <a href="{{route('get'.$services[3]->name.'Profile',['service_id'=>$services[3]->service_id,'provider_id'=>$services[3]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[3]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[3]->name}}</span>
              <span class="right">Rating:{{$services[3]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          <span class="clear"></span>
        </div>
      </div>

      <div class="col-12 col-m-12 col-t-12 left container-2">
        <h1 class="col-12 col-m-12 col-t-12 left">Our Picks</h1>
        <div id="row" class="col-12 col-m-12 col-t-12 left">
          @if ($count > 4)
          <a href="{{route('get'.$services[4]->name.'Profile',['service_id'=>$services[4]->service_id,'provider_id'=>$services[4]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[4]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[4]->name}}</span>
              <span class="right">Rating:{{$services[4]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count > 5)
          <a href="{{route('get'.$services[5]->name.'Profile',['service_id'=>$services[5]->service_id,'provider_id'=>$services[5]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[5]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[5]->name}}</span>
              <span class="right">Rating:{{$services[5]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count > 6)
          <a href="{{route('get'.$services[6]->name.'Profile',['service_id'=>$services[6]->service_id,'provider_id'=>$services[6]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[6]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[6]->name}}</span>
              <span class="right">Rating:{{$services[6]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count > 7)
          <a href="{{route('get'.$services[7]->name.'Profile',['service_id'=>$services[7]->service_id,'provider_id'=>$services[7]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[7]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[7]->name}}</span>
              <span class="right">Rating:{{$services[7]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
          @if ($count > 8)
          <a href="{{route('get'.$services[8]->name.'Profile',['service_id'=>$services[8]->service_id,'provider_id'=>$services[8]->provider_id])}}">
          <div class="card col-2 col-m-12 col-t-5 left">
            <img src="{{URL::asset('images')."/".$services[8]->service_provider_image}}">
            <div class="overlay">
              <span class="left">{{$services[8]->name}}</span>
              <span class="right">Rating:{{$services[8]->rating}}</span>
            </div>
          </div>
        </a>
          @endif
        </div>
        <span class="clear"></span>
    </div>

    <div class="col-12 col-m-12 col-t-12 left container-3">
      <h1 class="col-12 col-m-12 col-t-12 left">Categories</h1>
      <div id="row" class="col-12 col-m-12 col-t-12 left">
        <a href="{{route('getCarpenter')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
            <img src="images/services/logo_carpenter.png">
            <h3>Carpenter</h3>
          </div>
        </a>
        <a href="{{route('getMechanic')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
              <img src="images/services/logo_mechanic.png">
              <h3>Mechanic</h3>
          </div>
        </a>
          <a href="{{route('getElectrician')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
              <img src="images/services/logo_electrician.png">
              <h3>Electrician</h3>
          </div>
        </a>
        <a href="{{route('getPlumber')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
              <img src="images/services/logo_plumber.png">
              <h3>Plumber</h3>
          </div>
        </a>
        <a href="{{route('getLaundry')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
              <img src="images/services/logo_laundry.png">
              <h3>Laundry</h3>
          </div>
        </a>
          <a href="{{route('getStore')}}">
          <div class="card col-3 col-m-12 col-t-5 left">
              <img src="images/services/logo_store.png">
              <h3>Store</h3>
          </div>
        </a>
        <span class="clear"></span>
      </div>
    </div>

<span style="clear:both;"> </span>
@endsection
