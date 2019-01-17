<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ config('app.author') }}">
        <meta name="keywords" content="{{ config('app.keywords') }}">
        <meta name="description" content="{{ isset($description) ? $description : config('app.description') }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include ('partials.favicons')
        
        <title>{{ isset($title) ? $title ." | ". config('app.name') : config('app.name') }}</title>

        @if(config('app.env') != 'local')
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @endif
        
        {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="/css/website.css">
        {{-- <link rel="stylesheet" href="/css/timelinee.css"> --}}
        <link rel="stylesheet" href="/css/timeline.css">

        @yield('styles')
    </head>

    <body id="top" class="d-flex flex-column align-items-end" style="background-color:white ">

        <h1 class="d-none">{{ isset($title) ? $title : config('app.name') }}</h1>
        <div>@include('website.partials.header')</div>

        @include('website.partials.navigation')
        
        @if(Request::url() == route('main') )
            @include('website.partials.banner')
        @endif
        <div class="container">
            @include('flash::message')
        </div>

        <div class="bg-light">@yield('content')</div>
        
        @include('website.partials.footer')

        @include('website.partials.popups')
        
        {{-- back to top --}}
        <a href="#top" class="back-to-top jumper btn bg-gween" style="color:white">
            <i class="fa fa-angle-up"></i>
        </a>

        <script type="text/javascript" charset="utf-8" src="/js/website.js"></script>
        <script type="text/javascript" charset="utf-8" src="/js/wow/wow.js"></script>
        <script type="text/javascript" charset="utf-8" src="/js/wow/wow.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/js/timelinee.js"></script>
        <script>
            $('div.alert').not('.alert-important').delay(5000).slideUp(350);
        </script>
        @yield('scripts')
    </body>
</html>
