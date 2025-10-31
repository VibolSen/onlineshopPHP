<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Admin</title>
        <link rel="stylesheet" href="/onlineshop/assets/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="/onlineshop/admin" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="/onlineshop/admin/products" class="list-group-item list-group-item-action bg-light"><i class="fas fa-box"></i> Manage Products</a>
                <a href="/onlineshop/admin/categories" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tags"></i> Manage Categories</a>
                <a href="/onlineshop/admin/users" class="list-group-item list-group-item-action bg-light"><i class="fas fa-users"></i> Manage Users</a>
                <a href="/onlineshop/admin/orders" class="list-group-item list-group-item-action bg-light"><i class="fas fa-shopping-cart"></i> Manage Orders</a>
                <a href="/onlineshop/logout" class="list-group-item list-group-item-action bg-light"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome, <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/onlineshop/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title; ?></h1>
                <?php require_once __DIR__ . '/../' . $contentView; ?>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/onlineshop/assets/js/admin.js"></script>
</body>
</html>