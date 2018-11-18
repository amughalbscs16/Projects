<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title')</title>

        @yield('css')
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Scrollbar Custom CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ URL::asset('js/javascript.js') }}"></script>
        <script>
        function imageshow(that){
          document.getElementById('showimage').src = window.URL.createObjectURL(that.files[0]);
        }
        </script>
          @yield('excessjs')
    </head>

    <body>
<div class = "hariscss">

      <div id="page">
        <div id="header" class="col-12 col-m-12 col-t-12">

          <div id="logo" class="col-7 col-m-8 col-t-3 left">
            <div id="navbox" class="col-2 col-m-4 col-t-8 left selected"><h4><a href="{{route('getHomeView')}}"><img src="{{URL::asset('images/sahulat.png')}}" height='18' width="150"></a></h4></div>
            <div class="col-10 col-m-8 col-t-4 left">&nbsp;</div>
          </div>
          <div id="sidebartoggle" class="col-1 col-m-4 col-t-1 right" style="background-color:black;">
            <center><img src="{{URL::asset('images/toggle1.png')}}" height="100"/></center>
          </div>
          <div id="navigation" class="col-4 col-m-11 col-t-8 right">
            <div id="navbox" class="col-4 col-m-12 col-t-3 left"><h4><a href="{{route('getHomeView')}}">Home</a></h4></div>
            @if (Route::has('login'))
            @auth
            @if(auth()->user()->role == "user")
            @endif
            <div id="navbox" class="col-4 col-m-12 col-t-4 left"><h4><a href="{{route('getAboutUs')}}">About</a></h4></div>
            <div id="navbox" class="col-4 col-m-12 col-t-5 left"><h4><a href="{{route('logout')}}">Log Out</a></h4></div>
            @else
            <div id="navbox" class="col-4 col-m-12 col-t-4 left"><h4><a href="{{route('login')}}">Login</a></h4></div>
            <div id="navbox" class="col-4 col-m-12 col-t-5 left"><h4><a href="{{route('register')}}">Sign Up</a></h4></div>
            @endauth
            @endif

          </div>


          <span style="clear:both;"> &nbsp; </span>
        </div>
        <div id="content" class="col-12 col-m-12 col-t-12 left">
          <div id="sidebar" class="col-2 col-m-12 col-t-4 left">
            @auth
          </br>
            @if (auth()->user()->image)
            <div id="userimage" class="col-12 col-m-12 col-t-12">
              <center>
              <p><img src="{{ URL::asset('images')."/".auth()->user()->image}}" width="50%" height="100"/></p>
            <b>{{auth()->user()->name}}<br/>
            {{auth()->user()->role}}</b>
            </center>
          </div>
            @endif
            @endauth
            <a href="{{route('getHomeView')}}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Home</h4></div></a>
            <a href="#"><div class="col-12 col-m-12 col-t-12 sidebox" id="showservices"><h4>Services</h4></div></a>
            <div id="subshowservices" style="display:none;" class="col-12 col-m-12 col-t-12">
            <a href="{{route('getCarpenter')}}"><div class="col-12 col-m-12 col-t-12 subsidebox " id=""><h5>Carpenter</h5></div></a>
            <a href="{{route('getMechanic')}}"><div class="col-12 col-m-12 col-t-12 subsidebox " id=""><h5>Mechanic</h5></div></a>
            <a href="{{route('getPlumber')}}"><div class="col-12 col-m-12 col-t-12 subsidebox" id=""><h5>Plumber</h5></div></a>
            <a href="{{route('getElectrician')}}"><div class="col-12 col-m-12 col-t-12 subsidebox " id=""><h5>Electrician</h5></div></a>
            <a href="{{route('getLaundry')}}"><div class="col-12 col-m-12 col-t-12 subsidebox" id=""><h5>Laundry</h5></div></a>
            <a href="{{route('getStore')}}"><div class="col-12 col-m-12 col-t-12 subsidebox" id=""><h5>Super Store</h5></div></a>
            </div>
            @if (Route::has('login'))
            @auth
            @if(auth()->user()->role == "user")
            <a href="{{ Route('getUserProfile') }}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Profile</h4></div></a>
            @elseif (auth()->user()->role == "provider")
            <a href="{{ Route('getProviderProfile') }}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Profile</h4></div></a>
            <a href="{{ Route('getServiceProvider') }}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Provided Services</h4></div></a>
            @elseif (auth()->user()->role == "admin")
            <a href="{{ Route('getServiceAdmin') }}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Manage Services</h4></div></a>
            <a href="{{ Route('getServiceAnalysis') }}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Service Analysis</h4></div></a>
            @endif
            <a href="{{route('logout')}}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Log Out</h4></div></a>
            @else
            <a href="{{route('login')}}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Login</h4></div></a>
            <a href="{{route('register')}}"><div class="col-12 col-m-12 col-t-12 sidebox" id=""><h4>Sign Up</h4></div></a>
            @endauth
            @endif
         </div>
          <div id="pagedata" class="col-10 col-m-12 col-t-8 left">

            @yield('content')


        </div>
      </div>
      <div id="footer" class="col-12  col-m-12 col-t-12">
   <center>

        <div class = "clearboth"></div>

        <a href="{{route('getMechanic')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
         Mechanics
             <br/>

        </div>
        </a>
        <a href="{{route('getCarpenter')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
         Carpenters
             <br/>
        </div>
        </a>
        <a href="{{route('getPlumber')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
             Plumbers
             <br/>
        </div>
        </a>
        <a href="{{route('getElectrician')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
             Electricians
             <br/>
        </div>
        </a>
        <a href="{{route('getLaundry')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
             Laundry
             <br/>
        </div>
        </a>
        <a href="{{route('getStore')}}"><div id = "footercolumn" class = "col-2 col-m-12 col-t-6 left" style = "color:red">
             Stores
             <br/>
        </div>
      </a>
        <div id = "copyrightrow" class = "col-12 col-m-12 col-t-12 center">
             2018 &copy; Haris Ali Abdullah
             <br/>
             <br/>
             <br/>
        </div>
      </center>

      </div>
</div>
</div>
    </body>
</html>
