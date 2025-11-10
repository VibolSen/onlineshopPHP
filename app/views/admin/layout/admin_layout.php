<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Admin</title>
    <link rel="stylesheet" href="/onlineshop/assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Sidebar */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            transition: all 0.3s;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        #sidebar-wrapper .sidebar-heading {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 1.5rem;
            background: #343a40;
            color: #fff;
            text-align: center;
        }
        #sidebar-wrapper .list-group-item {
            border: none;
            padding: 1rem 1.5rem;
            transition: all 0.2s;
            color: #555;
        }
        #sidebar-wrapper .list-group-item:hover {
            background: #f0f0f0;
            color: #0012FF;
            font-weight: 500;
        }
        #sidebar-wrapper .list-group-item.active {
            background: #0d6efd;
            color: #2791F5;
            font-weight: 500;
        }
        /* Page content */
        #page-content-wrapper {
            width: 100%;
            padding: 20px;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ddd;
        }
        h1, h2, h3, h4 {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-end shadow-sm" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="/onlineshop/admin" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="/onlineshop/admin/products" class="list-group-item list-group-item-action bg-light"><i class="fas fa-box me-2"></i> Manage Products</a>
                <a href="/onlineshop/admin/categories" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tags me-2"></i> Manage Categories</a>
                <a href="/onlineshop/admin/users" class="list-group-item list-group-item-action bg-light"><i class="fas fa-users me-2"></i> Manage Users</a>
                <a href="/onlineshop/admin/orders" class="list-group-item list-group-item-action bg-light"><i class="fas fa-shopping-cart me-2"></i> Manage Orders</a>
                <a href="/onlineshop/logout" class="list-group-item list-group-item-action bg-light"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/onlineshop/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4 mb-4 text-primary"><?php echo $title; ?></h1>
                <?php require_once __DIR__ . '/../' . $contentView; ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/onlineshop/assets/js/admin.js"></script>
    <script>
        // Toggle sidebar
        const menuToggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');

        menuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            wrapper.classList.toggle('toggled');
        });
    </script>
    <style>
        /* Sidebar toggle effect */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }
    </style>
    <script>
        // Add active class to sidebar link
        const currentPath = window.location.pathname;
        const sidebarLinks = document.querySelectorAll('#sidebar-wrapper .list-group-item');
        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
