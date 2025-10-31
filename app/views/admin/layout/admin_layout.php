<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Admin</title>
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }
        .admin-sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
            height: 100vh;
        }
        .admin-sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .admin-sidebar a:hover {
            background-color: #555;
        }
        .admin-main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .admin-header {
            background-color: #f4f4f4;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-header a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <a href="/onlineshop/admin">Dashboard</a>
        <a href="/onlineshop/admin/products">Manage Products</a>
        <a href="/onlineshop/admin/categories">Manage Categories</a>
        <a href="/onlineshop/admin/users">Manage Users</a>
        <a href="/onlineshop/admin/orders">Manage Orders</a>
        <a href="/onlineshop/logout">Logout</a>
    </div>
    <div class="admin-main-content">
        <div class="admin-header">
            <h1><?php echo $title; ?></h1>
            <div>
                Welcome, <?php echo $_SESSION['username']; ?>! 
                <a href="/onlineshop/logout">Logout</a>
            </div>
        </div>
        <div class="admin-content-area">
            <?php require_once __DIR__ . '/../' . $contentView; ?>
        </div>
    </div>
</body>
</html>