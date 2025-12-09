<!DOCTYPE html>
<html lang="en">
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

</head>

<body>

    <!-- Spinner -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-success" role="status"></div>
    </div>

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


    {{-- Hero Section (افتراضي) --}}
    @section('hero')
    @yield('hero')
    <div class="hero d-flex align-items-center" style="background: url('{{ asset('img/hero-food.jpg') }}') center/cover no-repeat; height:90vh;">
        <div class="container text-center hero-overlay d-flex flex-column justify-content-center" style="background: rgba(0,0,0,0.5); height:100%;">
            <h1 class="text-white">Cook Smarter, Not Harder</h1>
            <p class="text-light">Find the best recipes & ingredients from what you already have at home!</p>
            <form class="d-flex justify-content-center mt-4">
                <input type="text" class="form-control w-50 rounded-pill px-4" placeholder="Search ingredients...">
                <button class="btn btn-main ms-2 px-4 rounded-pill">Search</button>
            </form>
        </div>
    </div>
    @show


    <!-- ✅ Hero Section (Homepage only) -->
    @if (request()->routeIs('home'))
    <section class="hero d-flex align-items-center justify-content-center text-center text-white"
             style="height: 100vh; background: #6c757d;">
        <div>
            <h1 class="fw-bold display-4 mb-3">Cook Smarter, Not Harder</h1>
            <p class="lead mb-4">Find the best recipes & ingredients from what you already have at home!</p>

            <form action="{{ route('search') }}" method="GET" class="d-flex justify-content-center">
                @csrf
                <input type="text" name="searchkey" class="form-control rounded-pill w-50 me-2" placeholder="Search ingredients...">
                <button type="submit" class="btn btn-danger rounded-pill px-4">Search</button>
            </form>
        </div>
    </section>
    @endif


    <!-- Main Content -->
    <main class="mt-5 pt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white-50 pt-5 mt-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-3">
                    <h4 class="text-light">About</h4>
                    <p>Fresh, organic, and healthy food delivered to your doorstep.</p>
                </div>
                <div class="col-md-3">
                    <h4 class="text-light">Shop</h4>
                    <a class="btn-link d-block" href="/shop">All Products</a>
                    <a class="btn-link d-block" href="/category">Categories</a>
                    <a class="btn-link d-block" href="/contact">Contact Us</a>
                </div>
                <div class="col-md-3">
                    <h4 class="text-light">Account</h4>
                    <a class="btn-link d-block" href="/login">Login</a>
                    <a class="btn-link d-block" href="/register">Register</a>
                    <a class="btn-link d-block" href="/cart">Cart</a>
                </div>
                <div class="col-md-3">
                    <h4 class="text-light">Contact</h4>
                    <p>Email: support@cookwhatyouhave.com</p>
                    <p>Phone: +123 456 789</p>
                </div>
            </div>
        </div>
        <div class="bg-black text-center py-3">
            <small class="text-light">&copy; {{ date('Y') }} CookWhatYouHave. All rights reserved.</small>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-0 rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- ✅ Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header border-0">
            <h5 class="modal-title fw-bold text-success" id="searchModalLabel">Search Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('search') }}" method="GET">
              @csrf
              <div class="input-group">
                <input type="text" name="searchkey" class="form-control rounded-start-pill" placeholder="Type ingredients or product name..." required>
                <button class="btn btn-success rounded-end-pill px-4" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')


</body>
</html>
