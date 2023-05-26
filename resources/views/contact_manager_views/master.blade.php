<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Manager - @yield('title')</title>
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap/css/costum_style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome/css/solid.css')}}" rel="stylesheet">

</head>
<body>

@yield('content')


<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@yield('js')
</body>
</html>
