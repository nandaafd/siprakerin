<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPRAKERIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/logobtx.png')}}" type="image/x-icon">  
</head>
<body>
<div class="cursor-1"></div>
<div class="cursor-2"></div>
<div id="menu-bars" class="fas fa-bars"></div>
    
<header>
</header>

<section class="service" id="service"> 
@yield('content')
</section>

<footer>
    {{-- @include('footer.footer') --}}
</footer>

    <script src="{{ asset('/js/auth.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>