<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Agency</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

    <header class="header">@include('includes.header')</header>

    <!--Slider for home-->
    @if (Request::is('/'))
    @include('includes.slider')
    @endif
    @yield('scripts')
    <div class="container" style="padding-top:20px">
    @yield('content')
    </div>

    <footer class="main-footer" style="background:linear-gradient(200deg, rgba(0,0,0, 0.9),rgba(144,89,255, 0.8)), url({{asset('/storage/images/design/newspaper.jpg')}}) fixed no-repeat center center">@include('includes.footer')</footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>