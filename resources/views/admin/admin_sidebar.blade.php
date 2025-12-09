<div class="sidebar">
    <h4>Admin Panel</h4>
    <ul class="nav flex-column mt-4">
        <li><a href="dashboard.php" class="nav-link"><i class="fa fa-chart-bar"></i> Dashboard</a></li>
        <li><a href="categories.php" class="nav-link"><i class="fa fa-folder-open"></i> Manage Categories</a></li>
        <li><a href="products.php" class="nav-link"><i class="fa fa-box"></i> Manage Products</a></li>
        <li><a href="members.php" class="nav-link"><i class="fa fa-users"></i> Manage Users</a></li>
        <li><a href="orders.php" class="nav-link"><i class="fa fa-shopping-cart"></i> Manage Orders</a></li>
        <li><a href="comments.php" class="nav-link"><i class="fa fa-comments"></i> Manage Comments</a></li>

        <li class="mt-3">
            <a href="members.php?do=Edit&userid=<?= $_SESSION['ID'] ?>" class="nav-link">
                <i class="fa fa-cog"></i> Edit Profile
            </a>
        </li>

        <li>
            <a href="logout.php" class="nav-link text-danger">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </li>
    </ul>
</div>
<style>
    body {
        background-color: #f5f6fa;
    }

    .sidebar {
        width: 250px;
        background: #0d6efd;
        color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        padding: 20px;
    }

    .sidebar h4 {
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 10px;
    }

    .sidebar .nav-link {
        color: #fff;
        padding: 10px 0;
        font-size: 16px;
        display: block;
    }

    .sidebar .nav-link.active {
        background: #033f9a;
        border-radius: 5px;
    }

    .content-area {
        margin-left: 270px;
        padding: 30px;
    }

    .stat-card {
        background: #007bff;
        padding: 25px;
        border-radius: 12px;
        color: #fff;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
    }

    .bg-users {
        background: #17a2b8 !important;
    }

    .bg-products {
        background: #28a745 !important;
    }

    .bg-categories {
        background: #ffc107 !important;
        color: #000;
    }

    .bg-comments {
        background: #dc3545 !important;
    }
</style>