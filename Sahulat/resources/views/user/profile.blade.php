@extends('layouts.master')
@section('bodytitle')
User Profile
@endsection
@section('content')
@foreach ($errors as $message)
    {{$message}}
@endforeach
  <center>
    {{Form::open(['route' => 'postUserProfile','files' => true])}}
    {{Form::token()}}
      <div id="loginregister" class="col-6 col-m-10 col-t-8">

      <center><h1>Edit User Profile</h1></center>
      <div class="col-12 col-m-12 col-t-12">
      <center>

        <div class="col-12 col-m-12 col-t-12"><b>Profile Picture</b></label></br></div>
        @if ($user->image)
        <div class="col-12 col-m-12 col-t-12"><center><img src="{{ URL::asset('images')."/".$user->image}}" id="showimage" alt="your image" width="100" height="100" /></br></center></div>
        @else
        <div class="col-12 col-m-12 col-t-12"><center><img src="../images/profile.png" id="showimage" alt="your image" width="100" height="100" /></br></center></div>
        @endif
        <div class="col-12 col-m-12 col-t-12"><input type="file" text="Upload File" onchange="imageshow(this)" name="profileimage"></div>
      </center>
      </div>
      <div class="col-12 col-m-12 col-t-12">
      <div class="col-6 col-m-12 col-t-12 left">
      <label for="fname"><b>First Name</b></label>
      <input type="text" value="{{$user->name}}" name="name" required>
      </div>
      <div class="col-6 col-m-12 col-t-12 left">
        <label for="email"><b>Email</b></label>
        <input type="text" value="{{$user->email}}" name="email" required>
      </div>
      </div>
      <div class="col-12 col-m-12 col-t-12">
        <div class="col-6 col-m-12 col-t-12 left">
        <label for="psw"><b>New Password</b></label>
        <input type="password" placeholder="Enter Password" name="newpassword">
        </div>
        <div class="col-6 col-m-12 col-t-12 left">
          <label for="currentpsw"><b>Current Password</b></label>
          <input type="password" placeholder="Enter Current Password" name="password">
        </div>
      </div>
      <br/>
      <div class="col-12 col-m-12 col-t-12">
        <div class="col-6 col-m-12 col-t-12 left">
        <label for="mobilenumber"><b>Mobile Number</b></label>
        <input type="text" value="+92-345-8156889" name="mobile" required>
        </div>
        <div class="col-6 col-m-12 col-t-12 left">
          <label for="cnic"><b>CNIC</b></label>
          <input type="text" value="{{$user->cnic}}" name="cnic" readonly>
        </div>
      </div>
      <label for="streetaddress"><b>Street Address</b></label>
      <input type="text" value="{{$person->address}}" name="address" required>
      <br/>
      <div class="col-12 col-m-12 col-t-12">
        <div class="col-6 col-m-12 col-t-12 left">
          <label for="city"><b>City</b></label>
          <input type="text" value="{{$person->city}}" name="city" required>
        </div>
        <div class="col-6 col-m-12 col-t-12 left">
          <label for="country"><b>Country</b></label>
          <input type="text" value="{{$person->country}}" name="country" required>
        </div>
      </div>
      <br/>

      <center>
      <button type="submit">Save Profile</button><center>
      </div>
    </center>

</div>
</center>

@endsection
