@extends('layouts.master')
@section('bodytitle')
Manage Services
@endsection
@section('content')
  <center>
    {{Form::open(['route' => 'postServiceProvider','files' => true])}}
    {{Form::token()}}
      <div id="loginregister" class="col-6 col-m-10 col-t-8">
      <center><h2>Add Service</h2></center>
      <center>
        <div class="col-12 col-m-12 col-t-12"><b>Service Image</b></label></br></div>
        <div class="col-12 col-m-12 col-t-12"><center><img src="../images/profile.png" id="showimage" alt="your image" width="100" height="100" /></br></center></div>
        <div class="col-12 col-m-12 col-t-12"><input type="file" text="Upload File" onchange="imageshow(this)" name="service_provider_image"></div>
      </center>
      {{Form::label('sid', 'Service Name', ['class' => 'awesome'])}}
        <select name="sid">
          @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
          @endforeach
        </select><br/>
          {{Form::hidden('pid',$provider->id)}}
        <div class="col-12 col-m-12 col-t-12">
        <div class="col-6 col-m-6 col-t-6" style="float:left;">
          {{Form::label('city', 'City', ['class' => 'awesome'])}}
          {{Form::text('city')}}
        </div>
        <div class="col-6 col-m-6 col-t-6" style="float:left;">
          {{Form::label('country', 'Country', ['class' => 'awesome'])}}
          {{Form::text('country')}}
        </div>
        </div>
        {{Form::label('address', 'Service Address', ['class' => 'awesome'])}}
        {{Form::text('address', '')}}
        {{Form::label('description', 'Description', ['class' => 'awesome'])}}
        {{Form::text('description', '')}}
        {{Form::label('mobile', 'Mobile', ['class' => 'awesome'])}}
        {{Form::text('mobile', '')}}
        {{Form::label('email', 'Email', ['class' => 'awesome'])}}
        {{Form::text('email', '')}}
        {{Form::label('website', 'Website', ['class' => 'awesome'])}}
        {{Form::text('website', '')}}
      <center>
        <button type="submit">Add Service</button>
      </center>
      {{Form::close()}}
  </div>
</br>
</center>
          <center>
        <h2>Provided Services</h2></center>
        @foreach($providedservices as $pservice)
        <div id="loginregister" class="col-6 col-m-12 col-t-12 left">
          <div class="col-12 col-m-12 col-t-12">
            <center>
              <img src="{{URL::asset('images')."/".$pservice->service_provider_image}}" width="30%" height="125"/>
            </center>
          </div>
          <div class="col-12 col-m-12 col-t-12">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Name</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->name}}</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Address</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->address}}</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>City</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->city}}</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Country</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->country}}</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Mobile</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->mobile}}&nbsp;</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Email</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->email}}&nbsp;</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Website</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->website}}&nbsp;</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Rating</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->rating}}&nbsp;</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-3 col-m-12 col-t-12 left"><h5><b>Rating Count</b></h5></div>
            <div class="col-9 col-m-12 col-t-12 left"><h5>{{$pservice->rating_count}}&nbsp;</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <div class="col-12 col-m-12 col-t-12 left"><h5><b>Description</b></h5></div>
            <div class="col-12 col-m-12 col-t-12 left"><h5>{{$pservice->description}}</h5></div>
            <span style="clear:both;"></span>
          </div>
          <div class="col-12 col-m-12 col-t-12 ">
            <center>
          <a href="{{route('deleteServiceProvider',['serviceid' => $pservice->service_id,'providerid' => $pservice->provider_id])}}" onclick="return confirm('Do you really want to submit the form?');">
            <img src="{{URL::asset('images/delete.png')}}" width="50" height="50"/>
          </a>
            </center>
          </div>
          <span style="clear:both;"></span>
        </div>
        @endforeach




</div>

</center>

@endsection
