@extends('layouts.master')
@section('bodytitle')
Electricians
@endsection
@section('css')
<style>
.container-1,.container-2,.container-3{
  background-color: rgba(0,0,0,0.2);
  margin-top:3%;
  border-radius: 10px;
  position: relative;
}
.container-1 #row .card{
  background: linear-gradient(rgba(206,113,242,0.4),rgba(255,255,255,0.8),rgba(206,113,242,0.4));
  margin-left: 5%;
}
.container-2 #row .card{
  background: linear-gradient(gray,rgba(255,255,255,0.8),gray);
  margin-left: 6.5%;
}
.container-3 #row .card{
  background: linear-gradient(rgba(0,255,0,0.5),rgba(255,255,255,0.8),rgba(0,255,0,0.5));
  margin-left: 3%;
}
h1{
  color: black;
  text-align: center;
}
#row{
  margin-bottom: 3%;
}
.card{
  position: relative;
  border: 1px solid black;
  border-radius: 5px;
  margin-top: 1%;
  /*background: linear-gradient(rgba(0,255,0,0.5),rgba(255,255,255,0.8),rgba(0,255,0,0.5));*/
}
.card img{
  position: relative;
  width: 50%;
  margin: 0% 0% 0% 9%;
  border-radius: 10%;
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
  font-size: 16px;
  font-weight: bold;
  background-color: black;
}
.container-2 #row .card img{
  height: 250px;
  width: 80%;
}
.container-3 #row .card img{
  height: 150px;
  width: 80%;
}
.container-3 #row .card .overlay span{
  margin-top: 35%;
  padding: 2%;
}
.overlay{
  opacity: 0;
}
#pagedata .overlay:hover{
  box-shadow: 0px 10px 0px black;
  opacity: 1;
}
.image_container{
  position: relative;
}
.image_container img{
  height: 350px;
}
.image_container .overlay{
  position: absolute;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  color: white;
}
.image_container .overlay span{
  margin-top: 0%;
  background-color: transparent;
  font-size: 32px;
  font-family: rockwell;
}    .card .trending{
  width: 80%;
  margin: 7% 0% 0% 10%;
}
.right_info{
  padding: 5% 0% 8.1% 0%;
}
.right_info p{
  padding-left: 0%;
  text-align: center;
  color: black;
  font-size: 20px;
}
#column{
  text-align: center;
}
.left_image img{
  height: 200px;
  width: 80%;
}
.container-2 .card{
  margin: 0% 0% 3% 0%;
}
@media only screen and (min-width: 401px) and (max-width: 800px) {
  .right_info p{
    font-size: 18px;
  }
  .card .overlay{
    width: 100%;
  }
  .card .overlay span{
    font-size: 12px;
  }
  .image_container .overlay span{
    font-size: 26px;
  }
}
@media only screen and (max-width: 400px) {
.card .overlay{
    width: 100%;
  }
  .card .overlay span{
    font-size: 12px;
  }
  .image_container .overlay span{
    font-size: 26px;
  }
}
</style>
@endsection
@section('content')
    <div class="col-12 col-m-12 col-t-12 left image_container">
        <div class="col-12 col-m-12 col-t-12 left"><img src="{{URL::asset('images')}}/electrician.jpg" width="100%" height="20%"></div>
        <div class="overlay">
            <span class="left">Got a problems with those wires or appliances? <br><br>Contact an electrician and <br>get your job done!</span>
        </div>
    </div>
    @if($count>0)
    <div class="col-12 col-m-12 col-t-12 left container-1">
      <h1 class="col-12 col-m-12 col-t-8 left">Top Rated</h1>
      <div id="row" class="col-12 col-m-12 col-t-12 left">
        @for ($i =0; $i<4 && $i<$count; $i++)
        <a href="{{route('getElectricianProfile',['service_id'=>$services[$i]->service_id,'provider_id'=>$services[$i]->provider_id])}}">
        <div class="card col-5 col-m-11 col-t-5 left">
          <div class="left_image col-6 col-m-12 col-t-12 left">
            <img src="{{URL::asset('images')."/".$services[$i]->service_provider_image}}" class="trending col-6 col-m-12 col-t-12 left">
          </div>
          <div class="right_info col-4 col-m-12 col-t-12 left">
          </br>
              <p>{{$services[$i]->country}}</p>
              <p>{{$services[$i]->city}}</p>
              <p>{{$services[$i]->rating}}</p>
              <p></br></p>
          </div>
        </div>
      </a>
        @endfor
      </div>
        <span class="clear"></span>
      </div>
    @endif
    @if ($count>4)
    <div class="col-12 col-m-12 col-t-12 left container-2">
      <h1 class="col-12 col-m-12 col-t-12 left">Our Picks</h1>
      <div id="row" class="col-12 col-m-12 col-t-12 left">
        @for ($i =4; $i<10 && $i<$count; $i++)
        <a href="{{route('getElectricianProfile',['service_id'=>$services[$i]->service_id,'provider_id'=>$services[$i]->provider_id])}}">
        <div class="card col-3 col-m-10 col-t-5 left">
          </br>
          <img src="{{URL::asset('images')."/".$services[$i]->service_provider_image}}">
          <div class="overlay">
            <span class="left">{{$services[$i]->city}}</span>
            <span class="right">{{$services[$i]->rating}}</span>
          </div>
          </br>&nbsp;
        </div>
      </a>
        @endfor
      </div>
        <span class="clear"></span>
    </div>
    @endif
    @if ($count>10)
    <div class="col-12 col-m-12 col-t-12 left container-3">
      <h1 class="col-12 col-m-12 col-t-12 left">Did not find what you were looking for? See below or click next to see all</h1>
      <div id="row" class="col-12 col-t-12 left">
        @for ($i =$count-1; $i>=7; $i--)
        <a href="{{route('getElectricianProfile',['service_id'=>$services[$i]->service_id,'provider_id'=>$services[$i]->provider_id])}}">
        <div class="card col-2 col-m-5 col-t-3 left">
          </br>&nbsp;
          <div class="col-12 col-m-12 col-t-12 left header"><img src="{{URL::asset('images')."/".$services[$i]->service_provider_image}}"></div>
          <div id="column" class="col-12 col-m-12 col-t-12 left"><h4>{{$services[$i]->city}}</h4><h5>Rating:{{$services[$i]->rating}}</h5></div>
        </br>&nbsp;
        </div>
      </a>
        @endfor

    </div>
  </div>
    @endif
  <span class="clear"> </span>
</div>

@endsection
