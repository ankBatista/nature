<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- Elegant Line Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/elegant-line-icons.css') }}">
    <!-- Elegant Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/elegant-font-icons.css') }}">
    <!-- Flat Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Slicknav CSS -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <!--Slick Slider-->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!--Slider CSS-->
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('css/venobox/venobox.css') }}">
    <!-- OWL-Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>


</head>

<body data-spy="scroll" data-target="#navmenu" data-offset="70">
    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div><!-- Preloader -->
    <div id="app">
        <header id="header" class="header-section">
            <div class="container">
                <nav class="navbar ">
                    <a href="{{ url('/index') }}" class="navbar-brand"><img src="img/logo-dark.png" alt="Arkit"></a>

                    <div class="d-flex menu-wrap">
                        <div id="mainmenu" class="mainmenu">
                            <ul class="nav">

                                <li>
                                    <a data-scroll class="nav-link active" href="index.html">Home<span class="sr-only">(current)</span></a>
                                    <ul>
                                        <li><a href="{{ url('/index') }}">Home Default</a></li>
                                        <li><a href="{{ url('/index') }}">Home Modern</a></li>
                                        <li><a href="{{ url('/index') }}">Home Classic</a></li>
                                        <li><a href="{{ url('/index') }}">Home Dark</a></li>
                                        <li><a href="{{ url('/index') }}">Home Video Bg</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">About</a>
                                    <ul>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="about-company.html">About Company</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services-1.html">Services 01</a></li>
                                        <li><a href="services-2.html">Services 02</a></li>
                                        <li><a href="services-3.html">Services 03</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Projects</a>
                                    <ul>
                                        <li><a href="projects.html">All Projects</a></li>
                                        <li><a href="project-single.html">Projects Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="team.html">Our Team</a></li>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-classic.html">Blog Classic</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>




                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header> <!--.header-section -->

        <div class="header-height"></div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <a data-scroll href="#header" id="scroll-to-top"><i class="arrow_carrot-up"></i></a>

    <!-- jQuery Lib -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <!-- Tether JS -->
    <script src="{{ asset('js/vendor/tether.min.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('js/vendor/jquery.slicknav.min.js') }}"></script>
    <!-- OWL-Carousel JS -->
    <script src="{{ asset('js/vendor/owl.carousel.min.js') }}"></script>
    <!-- Smooth Scroll JS -->
    <script src="{{ asset('js/vendor/smooth-scroll.min.js') }}"></script>
    <!-- Venobox JS -->
    <script src="{{ asset('js/vendor/venobox.min.js') }}"></script>
    <!-- Ajaxchimp JS -->
    <script src="{{ asset('js/vendor/jquery.ajaxchimp.min.js') }}"></script>
    <!--Slick Slider-->
    <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <!--Counterup JS-->
    <script src="{{ asset('js/vendor/jquery.counterup.min.js') }}"></script>
    <!--Waypoints JS-->
    <script src="{{ asset('js/vendor/jquery.waypoints.v2.0.3.min.js') }}"></script>
    <!--YTPlayer Js-->
    <script src="{{ asset('js/vendor/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('js/vendor/wow.min.js') }}"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPH8h1UpcK01BdcvoZeOzq-_wJqRxN1Pc">
    </script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
