@use('Illuminate\Support\Facades\Route')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(98880272, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/98880272" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    {{--  Meta tags  --}}
    <meta name="description"
          content="Explore, discover, and share creative ideas on Pinterest, save your favorite inspirations, and interests. Join our community today!">
    <meta name="keywords"
          content="Pinterest clone, save ideas, discover creativity, image sharing, social media, creative projects, inspiration, DIY, home decor, fashion, recipes">

    <meta property="og:title" content="Pinterest - Discover, Save, and Share Creative Ideas">
    <meta property="og:description"
          content="Pinterest is a platform where you can find, save, and share creative ideas, projects, and inspirations.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="{{ asset('assets/minimized-logo.png') }}">

    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    <title>
        @if(Route::is('home'))
            {{ config('app.name') }}
        @else
            @yield('page.title') | {{ config('app.name') }}
        @endif
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@unless(Route::is(['register', 'login', 'password.request', 'password.reset']))
    @include('components.header')
@endunless

@yield('content')

@unless(Route::is(['register', 'login', 'password.request', 'password.reset']))
    @include('components.bottom-nav')
@endunless

@stack('script')
</body>
</html>
