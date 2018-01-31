<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | rdr</title>
    <link rel="stylesheet" href="/css/custom_foundation.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/foundation_icons/foundation-icons.css">
    @yield('meta')
    <meta name="description" content="insert site description here." />
</head>
<body>
<div class="top-bar">
    <div class="top-bar-left">
        <a href="/">
            <div class="top-bar__title flex-container align-center-middle">rdr</div>
        </a>
    </div>
    <div class="top-bar-right">
        @yield('top-bar-right')
    </div>
</div>
<div class="main grid-container fluid">
    @yield('content')
</div>
<div class="grid-container full">
    <div class="footer grid-x">
        <div class="footer__content cell small-12 flex-container flex-dir-column align-center-middle">
            <span class="footer__content--text">made by jun tan, 2018</span>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/foundation.min.js"></script>
<!-- i don't know how or why this works but it works so please don't delete it -->
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
</script>
<script src="/js/app.js"></script>
</body>
</html>