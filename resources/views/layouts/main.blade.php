<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AcachaCasts')</title>
    @stack('beforeCSS')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('afterCSS')
</head>
<body class="bg-dark">
<div id="app">
    @yield('main-content')
</div>

@stack('beforeScripts')
<script src="{{ mix('js/app.js') }}"></script>
@stack('afterScripts')
</body>
</html>