<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Acachacasts')</title>
    @stack('BeforeCss')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('AfterCss')
</head>
<body>
    <sidebar>
        <h1>Episodes</h1>
        <ul>
            @foreach ($serie->episodes as $episode)
                <li><a href="/series/{{$serie->id}}/episodes/{{$episode->id}}">{{ $episode->name }}</a></li>
            @endforeach
        </ul>
    </sidebar>
    <div id="app">
        @yield('main-content')
    </div>
    @stack('beforeScripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('afterScripts')
</body>
</html>
