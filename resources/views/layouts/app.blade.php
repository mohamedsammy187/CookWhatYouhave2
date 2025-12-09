<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <title>@yield('title', 'CookWhatYouHave')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <meta name="keywords" content="@yield('keywords', 'organic, food, fruits, vegetables, ecommerce')">
    <meta name="description" content="@yield('description', 'Buy fresh organic fruits and vegetables online')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap & Custom CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }
        .navbar {
            border-radius: 12px;
        }
        .navbar .nav-link {
            font-weight: 600;
            transition: 0.3s;
        }
        .navbar .nav-link:hover {
            color: #198754 !important;
        }
        footer {
            border-top: 4px solid #198754;
        }
        footer h4 {
            margin-bottom: 1rem;
        }
        footer a.btn-link {
            color: #bbb;
            transition: 0.3s;
        }
        footer a.btn-link:hover {
            color: #fff;
            text-decoration: underline;
        }
        .back-to-top {
            background: linear-gradient(45deg, #198754, #20c997);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .back-to-top:hover {
            transform: scale(1.1);
        }
    </style>

    @stack('styles')
    <title>Test Counter</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Navbar -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl shadow-sm py-3">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <i class="fas fa-seedling text-success me-2"></i>
                <h1 class="text-success display-6 m-0">CookWhatYouHave</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-success"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active text-success' : '' }}">Home</a>
                    <a href="/category" class="nav-item nav-link">Category</a>
                    <a href="/product" class="nav-item nav-link">Product</a>
                    <a href="/shop" class="nav-item nav-link">Shop</a>
                    <a href="{{ route('cook') }}" class="nav-item nav-link">Cook</a>

                    <!-- Dropdown Section -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="extraDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="extraDropdown">
                            <li><a class="dropdown-item" href="/addproduct">Add Product</a></li>
                            <li><a class="dropdown-item" href="/productstable">producsTable</a></li>
                            <li><a class="dropdown-item" href="/review">Reviews</a></li>
                            <li><a class="dropdown-item" href="/contact">Contact</a></li>

                                                    <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        </ul>



                    </div>
                    <!-- Right icons -->
                    <div class="d-flex align-items-center">
                        <!-- 🔎 Search Button -->
                        <button class="btn border-0 bg-white me-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-search text-success fa-lg"></i>
                        </button>

                        <!-- 🛒 Cart -->
                        <a href="/cart" class="position-relative me-3">
                            <i class="fa fa-shopping-bag fa-2x text-dark"></i>
                            <span class="position-absolute bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                  style="top: -5px; left: 15px; height: 20px; min-width: 20px; font-size: 12px;">0</span>
                        </a>

                        <!-- 👤 Account -->
                        <a href="/account">
                            <i class="fas fa-user fa-2x text-dark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
</body>
</html>
