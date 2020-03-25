<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title', config('app.name') . " | Blog")</title>
    <meta name="description" content="@yield('meta-description', 'Este es el blog de Zendero')">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="{{ asset('adminlte/js/masonry.pkgd.min.js') }}"></script>

    @stack('styles')
    <style>
    .fade-enter-active, .fade-leave-active {
              transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }

    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
      transition: all .8s ease;
    }
    .slide-fade-leave-active {
      transition: all .6s cubic-bezier(.17, .67, .83, .67);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
      transform: translateY(800px);
      opacity: 0;
    }
    </style>
</head>
<body>
    <div id="app">
        <div class="preload"></div>
        <header class="space-inter">
            <div class="container container-flex space-between">
                <figure class="logo"><img src="{{ asset('img/logo.png') }}" alt=""></figure>
                <nav-bar></nav-bar>
            </div>
        </header>
        <div class="style-wrapper">
            <transition-group name="slide-fade" mode="out-in">
                <router-view :key="$route.fullPath"></router-view>
            <transition-group>
        </div>
        <section class="footer">
            <footer>
                <div class="container">
                    <figure class="logo"><img src="{{ asset('img/logo.png') }}" alt=""></figure>
                    <nav>
                        <ul class="container-flex space-center list-unstyled">
                            <li><a href="index.html" class="text-uppercase c-white">home</a></li>
                            <li><a href="about.html" class="text-uppercase c-white">about</a></li>
                            <li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
                            <li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
                        </ul>
                    </nav>
                    <div class="divider-2"></div>
                    <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
                    <div class="divider-2" style="width: 80%;"></div>
                    <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
                    <ul class="social-media-footer list-unstyled">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="tw"></a></li>
                        <li><a href="#" class="in"></a></li>
                        <li><a href="#" class="pn"></a></li>
                    </ul>
                </div>
            </footer>
        </section>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
