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