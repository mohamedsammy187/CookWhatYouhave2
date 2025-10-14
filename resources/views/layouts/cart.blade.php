<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your Cart - CookWhatYouHave</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
        .navbar-brand h1 { font-weight: 800; color: #ff6f61; }
        .btn-main { background: #ff6f61; color: #fff; font-weight: 600; border-radius: 50px; }
        .btn-main:hover { background: #e85c4e; }
        .cart-table img { width: 80px; height: 80px; object-fit: cover; border-radius: 10px; }
        .cart-summary { background: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
        footer { background: #1e1e1e; color: #bbb; padding: 40px 0; margin-top: 50px; }
        footer a { color: #ff6f61; text-decoration: none; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
        <div class="container">
            <a href="/" class="navbar-brand"><h1>CookWhatYouHave</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/category" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="/product" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="/shop" class="nav-link">Shop</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                </ul>
                <a href="/cart" class="btn btn-main ms-lg-3"><i class="fas fa-shopping-cart me-2"></i>Cart</a>
            </div>
        </div>
    </nav>

    <!-- Cart Page -->
    <div class="container py-5">
        <h2 class="mb-4">Your Shopping Cart</h2>

        @if($carts->count() > 0)
        @php $grandTotal = 0; @endphp
        <div class="row">
            <!-- Cart Table -->
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table align-middle cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                                @php
                                    $total = $cart->product->price * $cart->quantity;
                                    $grandTotal += $total;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($cart->product->imagpath ?? 'assets/img/default.png') }}"
                                                 alt="{{ $cart->product->name }}">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $cart->product->name }}</h6>
                                                <small class="text-muted">{{ $cart->product->price }} EGP</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="d-flex">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="form-control form-control-sm w-50">
                                            <button class="btn btn-sm btn-main ms-2">Update</button>
                                        </form>
                                    </td>
                                    <td>{{ $cart->product->price }} EGP</td>
                                    <td>{{ $total }} EGP</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h5>Order Summary</h5>
                    <hr>
                    <p class="d-flex justify-content-between"><span>Subtotal:</span> <strong>{{ $grandTotal }} EGP</strong></p>
                    <p class="d-flex justify-content-between"><span>Shipping:</span> <strong>Free</strong></p>
                    <hr>
                    <p class="d-flex justify-content-between"><span>Total:</span> <strong>{{ $grandTotal }} EGP</strong></p>
                    <a href="/checkout" class="btn btn-main w-100 mt-3">Proceed to Checkout</a>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-info">Your cart is empty.</div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} CookWhatYouHave. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
