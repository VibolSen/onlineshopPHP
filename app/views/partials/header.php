<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Online Shop'); ?></title>
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* All your CSS styles from the main file should be here or in your style.css */
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        header {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header .logo a {
            font-size: 1.8em;
            font-weight: 700;
            color: #333;
            text-decoration: none;
        }
        header .nav-links a {
            margin-left: 25px;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        header .nav-links a:hover {
            color: #007bff;
        }
        main {
            padding: 40px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            color: #222;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }
        .product-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .product-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .product-content h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #333;
        }
        .product-content p.description {
            margin: 0 0 15px;
            color: #666;
            flex-grow: 1;
        }
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
        .product-footer .price {
            font-size: 1.3em;
            font-weight: 700;
            color: #007bff;
        }
        .product-footer a {
            padding: 10px 18px;
            background: #007bff;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        .product-footer a:hover {
            background: #0056b3;
        }
        footer {
            text-align: center;
            padding: 40px 20px;
            background: #333;
            color: #fff;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="<?php echo BASE_URL; ?>">OnlineShop</a>
            </div>
            <div class="nav-links">
                <a href="<?php echo BASE_URL; ?>products">Products</a>
                <a href="<?php echo BASE_URL; ?>cart">Cart</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <a href="<?php echo BASE_URL; ?>admin">Admin Dashboard</a>
                    <?php endif; ?>
                    <a href="<?php echo BASE_URL; ?>profile">Profile</a>
                    <a href="<?php echo BASE_URL; ?>logout">Logout</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>login">Login</a>
                    <a href="<?php echo BASE_URL; ?>register">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>