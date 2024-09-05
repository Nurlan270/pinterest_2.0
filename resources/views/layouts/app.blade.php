@use('Illuminate\Support\Facades\Route')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    <title>
        @if(Route::is('home'))
            Pinterest 2.0
        @else
            @yield('page.title') | Pinterest 2.0
        @endif
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @unless(Route::is(['register', 'login']))
        @include('components.header')
    @endunless

    @yield('content')

    @unless(Route::is(['register', 'login']))
        @include('components.bottom-nav')
    @endunless
</body>
</html>
