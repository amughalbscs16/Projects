@extends('layouts.master')
@section('bodytitle')
Laundry
@endsection
@section('css')
<style>
.container-1,.container-2,.container-3{
  background-color: rgba(0,0,0,0.2);
  margin-top:3%;
  border-radius: 10px;
  position: relative;
}
h1{
  color: black;
  text-align: center;
}
#row{
  margin-bottom: 3%;
  margin-left: 3%;
}
.card{
  position: relative;
  border: 1px solid black;
  border-radius: 5px;
  margin-top: 1%;
  background: linear-gradient(rgba(0,255,0,0.5),rgba(255,255,255,0.8),rgba(0,255,0,0.5)); /*gray*/
  overflow: hidden;
}
.card img{
  position: relative;
  width: 50%;
  margin: 0% 0% 0% 25%;
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
  background-color: rgba(0,0,0,0.5);
  margin-left: 0%;
  color: white;
  height: 100%;
}
.overlay span{
  margin-top: 30%;
  padding: 5%;
  font-size: 100%;
  font-weight: bold;
  background-color: black;
}
.container-1 #row .card{
  background: linear-gradient(gold,rgba(255,255,255,0.8),gold);
  margin: 0% 2% 0% 3%;
}
.container-1 #row .one:hover{
  transform: scale(1.5);
}
.container-1 #row .two:hover{
  transform: scale(1.4);
}
.container-1 #row .one:hover span{
  font-size: 10px;
}
.container-1 #row .card img{
  left:-10%;
  width: 80%;
}
.container-2 #row .card{
  background: linear-gradient(gray,rgba(255,255,255,0.8),gray);
}
.container-3 #row .card{
  background: linear-gradient(rgba(0,255,0,0.5),rgba(255,255,255,0.8),rgba(0,255,0,0.5));
  margin-left: 2%;
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
}
.card .trending{
  width: 80%;
  margin: 7% 0% 0% 20%;
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
.container-1 #row .one .overlay span{
  font-size: 6px;
}
.container-1 #row .two .overlay span{
  font-size: 10px;
}
.container-1 #row .three .overlay span{
  font-size: 10px;
}
.container-1 #row .three img{
  height: 250px;
}
.container-1 #row .three:hover{
  transform: scale(1.2);
}
.container-1 #row .card span{
  margin-top: 60%;
}
.container-2 #row .card{
  margin-left: 5%;
}
.container-2 #row .mid img{
  margin-left: 5%;
  width: 90%;
}
.container-2 #row .mid .overlay span{
  margin-top: 6 0%;
}
.h170{
  height: 170px;
}
.h100{
  height: 100px;
}
.card .header img{
  height: 100px;
}
.container-1 #row .card{
margin-top: 5%;
}
@media only screen and (max-width: 400px) {
.container-1 #row .card:hover{
transform: scale(1);
}
.image_container .overlay span{
    font-size: 26px;
  }
.container-1 #row .card .overlay, .container-2 #row .card .overlay{
width: 100%;
}
.container-1 #row .card .overlay span{
margin-top: 10%;
font-size: 12px;
}
.container-1 #row .card img{
height: 250px;
}
.container-2 #row .card .overlay span{
font-size: 16px;
}
.container-2 #row .card:hover img{
transform: scale(1.3);
}
.container-2 #row{
  margin-left: -5%;
}
}

@media only screen and (min-width: 401px) and (max-width: 800px) {
.image_container .overlay span{
    font-size: 26px;
  }
.container-1 #row .card:hover{
transform: scale(1);
}
.container-1 #row{
margin-left:7%;
}
.container-3 #row{
margin-left:7%;
}
.container-1 #row .card .overlay, .container-2 #row .card .overlay{
width: 100%;
}
.container-1 #row .two{
float: right;
}
.container-2 #row .card span{
font-size: 12px;
}
.container-1 #row .card .overlay span{
margin-top: 10%;
}
.container-1 #row .one .overlay span{
  font-size: 10px;
}
.container-1 #row .two .overlay span{
  font-size: 14px;
}
.container-1 #row .three .overlay span{
  font-size: 18px;
}
}
</style>
@endsection
@section('content')
    <div class="col-12 col-m-12 col-t-12 left image_container">
        <div class="col-12 col-m-12 col-t-12 left"><img src="{{URL::asset('images')}}/laundry.jpg" width="100%" height="20%"></div>
        <div class="overlay">
            <span class="left" style="text-align: center;">Need those dirty clothes to be washed? Contact any laundry nearby and get your clothes washed.</span>
        </div>
    </div>
    <div class="col-12 col-m-12 col-t-12 left container-1">
         <h1 class="col-12 col-m-12 col-t-12 left">Top Rated</h1>
         <div id="row" class="col-11 col-m-12 col-t-11 left">
           @if ($count > 0)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[0]->service_id,'provider_id'=>$services[0]->provider_id])}}">
           <div class="card one col-1  col-m-11 col-t-6 left">
             <div class="col-12 col-m-12 col-t-12 left">
               <img src="{{URL::asset('images')."/".$services[0]->service_provider_image}}" class="trending col-6 col-m-12 col-t-11 left h100">
             </div>
             <div class="overlay">
                 <span class="left">{{$services[0]->city}}</span>
                 <span class="right">Rating:{{$services[0]->rating}}</span>
             </div>
           </div>
           </a>
           @endif
           @if ($count > 1)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[1]->service_id,'provider_id'=>$services[1]->provider_id])}}">
           <div class="card two col-2 col-m-11 col-t-8 left">
             <div class="col-12 col-m-12 col-t-12 left">
               <img src="{{URL::asset('images')."/".$services[1]->service_provider_image}}" class="trending col-6 col-m-12 col-t-12 left h170">
             </div>
             <div class="overlay">
               <span class="left">{{$services[1]->city}}</span>
               <span class="right">Rating:{{$services[1]->rating}}</span>
             </div>
           </div>
           </a>
           @endif
           @if ($count > 2)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[2]->service_id,'provider_id'=>$services[2]->provider_id])}}">
           <div class="card three col-3 col-m-11 col-t-10 left">
             <div class="col-12 col-m-12 col-t-12 left">
               <img src="{{URL::asset('images')."/".$services[2]->service_provider_image}}" class="trending col-6 col-m-12 col-t-12 left">
             </div>
             <div class="overlay ">
               <span class="left">{{$services[2]->city}}</span>
               <span class="right">Rating:{{$services[2]->rating}}</span>
             </div>
           </div>
           </a>
           @endif
           @if ($count > 3)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[3]->service_id,'provider_id'=>$services[3]->provider_id])}}">
           <div class="card two col-2 col-m-11 col-t-8 left">
             <div class="col-12 col-m-12 col-t-12 left">
               <img src="{{URL::asset('images')."/".$services[3]->service_provider_image}}" class="trending col-6 col-m-12 col-t-12 left h170">
             </div>
             <div class="overlay">
               <span class="left">{{$services[3]->city}}</span>
               <span class="right">Rating:{{$services[3]->rating}}</span>
             </div>
           </div>
           </a>
           @endif
           @if ($count > 4)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[4]->service_id,'provider_id'=>$services[4]->provider_id])}}">
           <div class="card one col-1 col-m-11 col-t-6 left">
             <div class="col-12 col-m-12 col-t-12 left">
               <img src="{{URL::asset('images')."/".$services[4]->service_provider_image}}" class="trending col-6 col-m-12 col-t-12 left h100">
             </div>
             <div class="overlay">
               <span class="left">{{$services[4]->city}}</span>
               <span class="right">Rating:{{$services[4]->rating}}</span>
             </div>
           </div>
           </a>
           @endif
           <span class="clear"></span>
         </div>
       </div>

       <div class="col-12 col-m-12 col-t-12 left container-2">
         <h1 class="col-12 col-m-12 col-t-12 left">Near You</h1>
         <div id="row" class="col-12 col-m-12 col-t-12 left">
           <div class="col-3 col-m-12 col-t-11 left">
             @if ($count > 5)
             <a href="{{route('getLaundryProfile',['service_id'=>$services[5]->service_id,'provider_id'=>$services[5]->provider_id])}}">
             <div class="card col-12 col-m-12 col-t-5 left">
               <img src="{{URL::asset('images')."/".$services[5]->service_provider_image}}" class="h170">
               <div class="overlay">
                 <span class="left">{{$services[5]->city}}</span>
                 <span class="right">Rating:{{$services[5]->rating}}</span>
               </div>
             </div>
             </a>
             @endif
             @if ($count > 6)
             <a href="{{route('getLaundryProfile',['service_id'=>$services[6]->service_id,'provider_id'=>$services[6]->provider_id])}}">
             <div class="card col-12 col-m-12 col-t-5 left">
               <img src="{{URL::asset('images')."/".$services[6]->service_provider_image}}" class="h170">
               <div class="overlay">
                 <span class="left">{{$services[6]->city}}</span>
                 <span class="right">Rating:{{$services[6]->rating}}</span>
               </div>
             </div>
             </a>
             @endif
           </div>
           @if ($count > 7)
           <a href="{{route('getLaundryProfile',['service_id'=>$services[7]->service_id,'provider_id'=>$services[7]->provider_id])}}">
           <div class="card col-4 col-m-12 col-t-10 left mid" style="height: 44%;">
             <img src="{{URL::asset('images')."/".$services[7]->service_provider_image}}" style="height: 350px;">
             <div class="overlay">
               <span class="left">{{$services[7]->city}}</span>
               <span class="right">Rating:{{$services[7]->rating}}</span>
             </div>
           </div>
           </a>
           <div class="col-3 col-m-12 col-t-11 left">
             @endif
             @if ($count > 8)
             <a href="{{route('getLaundryProfile',['service_id'=>$services[8]->service_id,'provider_id'=>$services[8]->provider_id])}}">
             <div class="card col-12 col-m-12 col-t-5 left">
               <img src="{{URL::asset('images')."/".$services[8]->service_provider_image}}" class="h170">
             <div class="overlay">
               <span class="left">{{$services[8]->city}}</span>
               <span class="right">Rating:{{$services[8]->rating}}</span>
             </div>
             </div>
           </a>
             @endif
             @if ($count > 9)
             <a href="{{route('getLaundryProfile',['service_id'=>$services[9]->service_id,'provider_id'=>$services[9]->provider_id])}}">
             <div class="card col-12 col-m-12 col-t-5 left">
               <img src="{{URL::asset('images')."/".$services[9]->service_provider_image}}" class="h170">
               <div class="overlay">
                 <span class="left">{{$services[9]->city}}</span>
                 <span class="right">Rating:{{$services[9]->rating}}</span>
               </div>
             </div>
           </a>
             @endif
           </div>
         </div>
           <span class="clear"></span>
       </div>
    @if ($count>10)
    <div class="col-12 col-m-12 col-t-12 left container-3">
      <h1 class="col-12 col-m-12 col-t-12 left">Did not find what you were looking for? See below or click next to see all</h1>
      <div id="row" class="col-12 col-t-12 left">
        @for ($i =$count-1; $i>=7; $i--)
        <a href="{{route('getLaundryProfile',['service_id'=>$services[$i]->service_id,'provider_id'=>$services[$i]->provider_id])}}">
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
