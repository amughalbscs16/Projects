@extends('layouts.master')
@section('bodytitle')
User Profile
@endsection
@section('content')
<center>
  {{Form::open(['route' => 'postProviderProfile','files' => true])}}
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
    <label for="fname"><b>Name</b></label>
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
      <input type="text" value="{{$user->mobile}}" name="mobile" required>
      </div>
      <div class="col-6 col-m-12 col-t-12 left">
        <label for="cnic"><b>CNIC</b></label>
        <input type="text" value="{{$user->cnic}}" name="cnic" readonly>
      </div>
    </div>
    <br/>

    <center>
    <button type="submit">Save Profile</button><center>
    </div>
  </center>
@endsection
