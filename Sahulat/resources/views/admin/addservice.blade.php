@extends('layouts.master')
@section('bodytitle')
Add Services
@endsection
@section('content')
<center>
  {{Form::open(['route' => 'postServiceAdmin'])}}
  {{Form::token()}}
    <div id="loginregister" class="col-6 col-m-10 col-t-8">

    <center><h1>Add Service</h1></center>
    <label for="fname"><b>Service Name</b></label>
    <input type="text" placeholder="Enter Service Name to Add" value="" name="name" required>
    <br/>
    <center>
      <button type="submit">Add Service</button>
    </center>
    {{Form::close()}}
    <table class="table" width="50%" align="center">
      <tbody>
        <thead>
          <tr>
            <th>Service Name</th>
            <th>Delete</th>
          </tr>
        </thead>
      @foreach($services as $service)
      <tr>
        <td>{{$service->name}}</td>
        <td>
          <a href="{{route('deleteServiceAdmin',[$service->id])}}" onclick="return confirm('Do you really want to submit the form?');"><img src="{{URL::asset('images/delete.png')}}" width="40" height="40"></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</center>
<div class="table-responsive">

</div>
</center>

@endsection
