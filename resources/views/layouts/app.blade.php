<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
   <link rel="stylesheet" href="{{asset('front/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('front/bootstrap-theme.min.css')}}">
   <link rel="stylesheet" href="{{asset('front/custom.css')}}">
   <link rel="stylesheet" href="{{asset('front/dropzone.min.css')}}">
   <link rel="stylesheet" href="{{asset('front/sweetalert.css')}}">
   <link rel="stylesheet" href="{{asset('front/lity.min.css')}}">
   {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   

</head>
<body id="app-layout">
    <div class="container">
    @include('partials.nav')
    @yield('content')

    <!-- JavaScripts -->
    <script src="{{asset('front/jquery.min.js')}}"></script>
    
    <script src="{{asset('front/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/sweetalert-dev.js')}}"></script>
    <script src="{{asset('front/lity.min.js')}}"></script>
    @include('flash')
    @yield('footer')
    </div>
</body>
</html>
