<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
        <meta name="user" value="{{auth()->user()->id}}">
    @endif
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>