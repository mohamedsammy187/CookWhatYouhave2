<?php
ob_start(); //output buffering start  
// include '../admin/dashboard.php';

session_start();

if (!isset($_SESSION['Username']) || empty($_SESSION['ID'])) {
    header('Location: login.php');
    exit();
}

include 'init.php';
include 'admin_middleware.php';

$userid = $_SESSION['ID'];
$username = $_SESSION['Username'];

// Dashboard Queries
// $totalUsers = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$pendingUsers = $conn->query("SELECT COUNT(*) FROM users WHERE RegStatus = 0")->fetchColumn();
$totalItems = $conn->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalOrders = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();

$totalComments = $conn->query("SELECT COUNT(*) FROM comments")->fetchColumn();

// Latest data
// $latestUsers = $conn->query("SELECT Username FROM users ORDER BY UserID DESC LIMIT 5")->fetchAll();
//another but by a function getLatest
$latestUsers = getLatest('*', 'users', 'UserID',);
$latestItems = $conn->query("SELECT * FROM categories ORDER BY CatID DESC LIMIT 6")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link href="layout/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="layout/css/fontawesome.min.css">

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

        .stat-card {
            background: #007bff;
            padding: 25px;
            border-radius: 12px;
            color: #fff;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
        }

        .sidebar h4 {
            border-bottom: 1px solid rgba(255, 255, 255, .3);
            padding-bottom: 10px;
        }

        .stat-card h4 {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .stat-card h2 span a {
            font-size: 48px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .stat-card h2 span a:hover {
            color: #e3e3e3;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 10px 0;
            font-size: 16px;
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
            border-radius: 10px;
            padding: 20px;
            color: #fff;
        }


        .bg-users {
            background: #0d6efd;
        }

        .bg-items {
            background: #6610f2;
        }

        .bg-comments {
            background: #20c997;
        }

        .bg-pending {
            background: #dc3545;
        }

        .list-group-item {
            border: none;
            background: #fff;
            padding: 10px 15px;
        }

        /* Optional background colors for different cards */
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

</head>

<body>

    <!-- Sidebar -->
<?php include 'admin_sidebar.php'; ?>
    <!-- Page Content -->
    <div class="content-area">
        <h2 class="mb-4">Welcome🖐🏼, <strong><?php echo htmlspecialchars($username); ?></strong></h2>

        <!-- Statistics Row -->
        <div class="row mb-4">

            <div class="col-md-3">
                <div class="stat-card bg-users">
                    <h4>Total Members</h4>
                    <h2>
                        <span>
                            <a href="members.php"><?php echo countItems('UserID', 'users') ?></a>
                        </span>
                    </h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card bg-pending">
                    <h4>Pending Members</h4>
                    <h2>
                        <span>
                            <a href="members.php?do=Manage&page=Pending">
                                <?php echo checkItem("RegStatus", "users", 0); ?>
                            </a>
                        </span>
                    </h2>
                </div>
            </div>


            <div class="col-md-3">
                <div class="stat-card bg-items">
                    <h4>Total Items</h4>
                    <!-- <h2><?php echo $totalItems; ?></h2> -->
                    <h2>
                        <span>
                            <a href="categories.php"><?php echo countItems('CatID', 'categories') ?></a>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-items">
                    <h4>Total Orders</h4>
                    <!-- <h2><?php echo $totalOrders; ?></h2> -->
                    <h2>
                        <span>
                            <a href="orders.php"><?php echo countItems('user_id', 'orders') ?></a>
                        </span>
                    </h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card bg-comments">
                    <h4>Total Comments</h4>
                    <h2>
                        <span>
                            <a href="comments.php"><?php echo countItems('CommentID', 'comments') ?></a>
                        </span>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Latest Users & Items -->
        <div class="row">

            <div class="col-md-6">
                <div class="card shadow-sm mb-3 latest-users-card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-users"></i> Latest Registered Users
                    </div>

                    <ul class="list-group list-group-flush">
                        <?php foreach ($latestUsers as $user): ?>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-user"></i>
                                    <span class="username">
                                        <?= htmlspecialchars($user['Username']) ?>
                                    </span>
                                </div>

                                <div>
                                    <a href="members.php?do=Edit&userid=<?= $user['UserID'] ?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <?php if ($user['RegStatus'] == 0): ?>
                                        <a href="members.php?do=Activate&userid=<?= $user['UserID'] ?>"
                                            class="btn btn-info btn-sm activate">
                                            <i class="fa fa-close"></i> Activate
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Latest Items -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-3 latest-items-card">
                    <div class="card-header bg-success text-white">
                        <i class="fa fa-box"></i> Latest Added Items
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($latestItems as $i): ?>
                            <li class="list-group-item latest-item">
                                <div class="item-header">
                                    <i class="fa fa-box"></i>
                                    <?php echo htmlspecialchars($i['Name']); ?>
                                    <button class="toggle-details btn btn-sm btn-info float-end">
                                        Details <i class="fa fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="item-details">
                                    <p><strong>Name:</strong> <?= $i['Name'] ?></p>
                                    <p><strong>Description:</strong> <?= !empty($i['Description']) ? $i['Description'] : 'No description' ?></p>
                                    <p><strong>Comments:</strong> <?= $i['Allow_Comment'] ?></p>
                                    <p><strong>Ads:</strong> <?= $i['Allow_Ads'] ?></p>
                                    <div class="cat-controls">
                                        <a href="edit_category.php?id=<?= $i['CatID'] ?>" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="delete_category.php?id=<?= $i['CatID'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?');">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


        </div>
    </div>
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
</body>

</html>
<?php ob_end_flush() ?>
<style>
    /* Latest Users Card */
    .latest-users-card .card-header {
        font-size: 18px;
        font-weight: bold;
    }

    .latest-users-card ul li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 15px;
    }

    .latest-users-card ul li i.fa-user {
        color: #0d6efd;
        margin-right: 10px;
        font-size: 18px;
    }

    /* Username Styling */
    .latest-users-card .username {
        font-weight: 500;
        font-size: 16px;
    }

    /* Buttons inside list */
    .latest-users-card .btn {
        padding: 4px 10px;
        font-size: 13px;
        margin-left: 5px;
    }


    /* Edit Button */
    .latest-users-card .btn-success {
        background-color: #28a745;
        border-color: #28a745;

    }

    /* Activate Button */
    .latest-users-card .btn-info.activate {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
    }

    /* List Hover */
    .latest-users-card ul li:hover {
        background: #f8f9fa;
        transition: 0.2s ease-in-out;
    }

    .latest-items-card .list-group-item {
        cursor: pointer;
        position: relative;
        padding: 10px 15px;
    }

    .latest-items-card .item-details {
        display: none;
        margin-top: 10px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 6px;
    }

    .latest-items-card .item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .latest-items-card .item-controls {
        margin-top: 10px;
    }

    .latest-items-card .toggle-details {
        font-size: 12px;
        padding: 2px 6px;
    }

    /* Optional: rotate icon when open */
    .latest-items-card .toggle-details.open i {
        transform: rotate(180deg);
    }
</style>