<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Project Flyer</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/libs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
</head>
<body>


@include('layouts.nav')



<div class="container">
    @yield('content')
</div>


<script src="/js/libs.js"></script>

@yield('scripts.footer')

@include('sweet::alert')



</body>
</html>