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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        <script src="<?php echo BASE_URL; ?>assets/js/modal.js" defer></script>
    </head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
            <a class="navbar-brand text-white" href="<?php echo BASE_URL; ?>">OnlineShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>contact">Contact</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>cart">Cart</a>
                        </li>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>admin">Admin Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="openModal(`
    <form action='/onlineshop/auth/login' method='POST' class='form-container'>
        <h2>Login</h2>
        <div class='form-group'>
            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' class='form-control' required>
        </div>
        <div class='form-group'>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' class='form-control' required>
        </div>
        <button type='submit' class='btn btn-primary'>Login</button>
    </form>
`)">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="openModal(`
    <form action='/onlineshop/auth/register' method='POST' class='form-container'>
        <h2>Register</h2>
        <div class='form-group'>
            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' class='form-control' required>
        </div>
        <div class='form-group'>
            <label for='email'>Email:</label>
            <input type='email' id='email' name='email' class='form-control' required>
        </div>
        <div class='form-group'>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' class='form-control' required>
        </div>
        <button type='submit' class='btn btn-success'>Register</button>
    </form>
`)">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>