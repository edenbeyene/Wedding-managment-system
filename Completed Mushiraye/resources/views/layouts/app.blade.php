<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name = "description" content="@yield('meta_description')">
    <meta name = "keywords" content="@yield('meta_keywords')">
    <meta name = "author" content="@yield('Mushiraye Vendor')">

  
    
   
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   

    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

    <!-- Styles -->
         {{-- <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    
@livewireStyles
 
</head>
<body>
    <div id="app">

        {{-- @include('layouts.inc.frontend.navbar') --}}
         @include('layouts.inc.frontend.navbar') 
        <main>
            @yield('content')
        </main>
    </div>

<!-- Scripts -->


<!-- Template Main JS File -->

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"> </script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"> </script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"> </script>

    @livewireScripts
</body>

</html>







