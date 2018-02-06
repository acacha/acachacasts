@extends('layouts.series')

@section('main-content')
    <h1>{{ $episode->name }}</h1>
    <p>{{ $episode->description }}</p>
    <form method="get" action="{{ asset($episode->path) }}">
        <a href="{{ asset($episode->path) }}" class="btn btn-primary" role="button" download="{{ basename(asset($episode->path)) }}">Download Video</a>
    </form>

    <video class="video-js vjs-default-skin" controls data-setup="{}" preload="auto" width="640" height="264"
           poster="MY_VIDEO_POSTER.jpg">
        {{--<source src="https://player.vimeo.com/video/254457715" type="video/mp4">--}}
        <source src="{{ asset($episode->path) }}" type="video/mp4">
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
@endsection

@push('afterScripts')
    <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
@endpush

@push('AfterCss')
    <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
@endpush

