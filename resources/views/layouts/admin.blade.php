<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ Custom CSS -->
    <link rel="stylesheet" href="layouts/css/style.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4>Admin Panel</h4>
            <hr>

            <ul class="nav flex-column">
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i
                            class="fa fa-chart-bar"></i>Dashboard</a></li>
                <li><a href="{{ route('admin.categories') }}" class="nav-link"><i class="fa fa-folder-open"></i> Manage Categories</a>
                <li><a href="{{ route('admin.products') }}" class="nav-link"><i class="fa fa-box"></i> Manage Products</a></li>
                <li><a href="{{ route('admin.users') }}" class="nav-link"><i class="fa fa-users"></i> Manage Users</a></li>
                <li><a href="orders.php" class="nav-link"><i class="fa fa-shopping-cart"></i> Manage Orders</a></li>
                <li><a href="comments.php" class="nav-link"><i class="fa fa-comments"></i> Manage Comments</a></li>
                </li>
            </ul>
        </div>

        <div class="p-4" style="flex: 1;">
            @yield('content')
        </div>
    </div>
<div>
        <script>
        document.querySelectorAll('.toggle-details').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const details = this.closest('.latest-item').querySelector('.item-details');
                details.style.display = details.style.display === 'block' ? 'none' : 'block';
                this.classList.toggle('open');
            });
        });
    </script>


    <script src="layout/js/bootstrap.bundle.min.js"></script>
</div>
    <!-- ✅ jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Custom JS -->
    <script src="js/main.js"></script>

    <!-- <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script> -->


</body>

</html>
