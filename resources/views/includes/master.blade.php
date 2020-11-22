<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Agency</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">NewsAgency</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories')}}">Categories</a>
      </li>
        @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{route('showusers')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <form method="post" action="{{route('logout')}}">
        @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
      </li>
        <!--<a class="nav-link disabled" href="{{route('logout')}}">Logout</a>-->
        @else
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Login</a>
      </li>
        @endif
      
    </ul>
  </div>
</nav>



    @yield('scripts')
   
    <div class="container" style="padding-top:20px">
    @yield('content')
    </div>

    <footer></footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>