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
        <script src="<?php echo BASE_URL; ?>assets/js/modal.js" defer></script>
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
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/auth/login' method='POST' class='form-container'>
        <h2>Login</h2>
        <div class='form-group'>
            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' required>
        </div>
        <div class='form-group'>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' required>
        </div>
        <button type='submit'>Login</button>
    </form>
`)">Login</a>
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/auth/register' method='POST' class='form-container'>
        <h2>Register</h2>
        <div class='form-group'>
            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' required>
        </div>
        <div class='form-group'>
            <label for='email'>Email:</label>
            <input type='email' id='email' name='email' required>
        </div>
        <div class='form-group'>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' required>
        </div>
        <button type='submit'>Register</button>
    </form>
`)">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>