<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Agency</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @if(Auth::check())
    <form method="post" action="{{route('logout')}}">
        @csrf

        <button type="submit">Logout</button>
    </form>
    @endif

    @yield('scripts')
    @yield('content')



    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>