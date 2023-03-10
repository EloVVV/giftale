<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    <script src="{{asset('public/assets/js/slider.js')}}" defer></script>
    <title>@yield('page_title')</title>
</head>
<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')
</body>
</html>
