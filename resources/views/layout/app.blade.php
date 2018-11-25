<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cidade Unida</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link href="/css/theme.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<!--[if lt IE 9]>
<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->

<div class="preloader">
    <div class="preloader_image"></div>
</div>

<div id="canvas">
    <div id="box_wrapper">

        

        <header id="menu" class="page_header header_white ls ms">
        </header>

        @yield('content')

    </div>
</div>

<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/theme.js"></script>
</body>
</html>
