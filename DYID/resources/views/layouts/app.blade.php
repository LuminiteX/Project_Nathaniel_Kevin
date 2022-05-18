<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>DYID</title>
    <style>
        /* Making sure of fullsize */
        html,body{
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
            min-height: 100vh;
            overflow-x:hidden;
        }

        body{
            background-color: rgb(235, 235, 235);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        footer,header, .content{
            padding: 0px;
            margin: 0px;
        }
        .content{
            min-height: calc(100vh - 137px - 114px);
        }
    </style>

    @yield('style')
</head>
<body>
    
{{-- Header --}}
<header>
    @include('layouts/header')
</header>

{{-- yield to get content from another page --}}
<div class="content">
    @yield('content') 
</div>

{{-- Footer --}}
<footer>
    @include('layouts/footer')
</footer>
</body>
</html>