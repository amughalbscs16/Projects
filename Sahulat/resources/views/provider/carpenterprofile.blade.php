@extends('layouts.master')
@section('bodytitle')
Carpenter
@endsection
@section('css')
<style>

</style>
@endsection
@section('content')
<div class = "hariscss">
<center>
      <div class="carpenterheader">
         <h2>Carpenter</h2>
      </div>
      </center>
      <!--line break-->
        <br/>
        <div class = "clearleft"></div>
        <!--profile pic and info row-->
        <div class = "row">
        <!--profile pic div here-->
        <div class = "col-2 col-m-12 col-t-8 left profilepic" >
        <img src ="{{URL::asset('images'."/".$provider->service_provider_image)}}">
        <div class ="clearleft"></div>

        <!--skills div here-->
        <div class = "pskills">
        <p id = "#skills" style="text-align: center; ">
          <h2 style ="opacity: 0.5">
            Location
          </h2>
          <hr/>
          <b style="opacity: 0.5;"><br/>{{$provider->description}}
        </p>
        </div>
      </div>

        <!--provider information div here-->
        <div class = "col-7 col-m-12 col-t-12 left info" style="background-color: rgba(224, 126, 0, 0.3); border-radius:20px;">
        <p id = "#provderName" style = "text-align: left;">
          <b style="opacity: 0.5">
            Address:
          </b>
          <span style ="color:Black;"><b>{{$provider->address}},{{$provider->city}},{{$provider->country}}</b>
          </span>
      </p>
        <p id = "#rating" style = "text-align: left;">
        <b style="opacity: 0.5">
          Rating
        </b>
        <span style ="color:Black;"><b>{{$provider->rating}}</b>
        </span>
    </p>
    <p id = "#ratingcount" style = "text-align: left;">
      <b style="opacity: 0.5">
        Rating Count:
      </b>
      <span style ="color:Black;"><b>{{$provider->rating_count}}</b>
      </span>
  </p>
        <p id = "#contact" style ="text-align: left;"><b style="opacity: 0.5;">Phone: </b><span style="color:Black"><b>{{$provider->mobile}}</b></span>
        <br/><br/>
        <b style="opacity: 0.5;">Email: </b><span style="color:Black;"><b>{{$provider->email}}</b></span>
          <br/><br/>
        <b style="opacity: 0.5;">Website:</b>
        <span style="color:Black;"><b>
        {{$provider->website}}</b></span>
        </p>
        @if(strtoupper(auth()->user()->role)=="USER")
        @if(!$alreadyrated)
        {{Form::open(['route' => 'postServiceRatings'])}}
        {{Form::token()}}
        {{Form::hidden('service_id',$provider->service_id)}}
        {{Form::hidden('provider_id',$provider->provider_id)}}
        {{Form::hidden('user_id',auth()->user()->id)}}
        {{Form::radio('rating','1')}}
        {{Form::radio('rating','2')}}
        {{Form::radio('rating','3')}}
        {{Form::radio('rating','4')}}
        {{Form::radio('rating','5')}}
        {{Form::submit('Rate')}}
        {{Form::close()}}
        @endif
        @endif
        <button class = "col-2 col-m-12 col-t-11 center button ">
        <i class="fa fa-mobile"></i> Call
        </button>
        <button class = "col-2 col-m-12 col-t-11 center button">
      <i class = "fa fa-envelope-o"></i>
       Text
        </button>
        <button id = "chatbtn" class = "col-2 col-m-12 col-t-11 center button">
      <i class = "fa fa-comment-o"></i>
       Chat
        </button>
        <button class = "col-2 col-m-12 col-t-11 center button">
      <i class = "fa  fa-exclamation"></i>
       Report
        </button>
         <!--Map div here-->
         <div class = "clearleft"></div>
         <h3 style = "text-align: left;opacity: 0.5"> Location </h3>
        <div id="map" style="width:600px;height:400px;background:Black;float: left margin-top:10%;">
          <iframe width="100%" height="100%"
          frameborder='0' style='border:0'
          src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyCMb5TqwQsy_58xGWpj1iO1XE4utDeB67w&origin=
          {{$location}}&destination={{$provider->address.",".$provider->city.",".$provider->country}}
          &avoid=tolls|highways" allowfullscreen></iframe></div>
        <!--JS API call Google Maps-->
        <b>Note: If Map doesn't load properly, check your profile and add your address</b>

        <!--new chatbox div here-->

    <div class = "col-3 col-m-10 col-t-5 right chatbox">
     <img src = "{{URL::asset('images/chatbox.jpg')}}">
      </div>

    </div>
        </div>
       <!--old chatbox here-->
      <script>

      $(function(){
        $("#chatbtn").on('click',function(){
          $('.chatbox').fadeToggle();
        })

      });

      </script>

</div>

@endsection
