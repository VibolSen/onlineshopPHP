<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/onlineshop/">Home</a>
            <a href="/onlineshop/products">Products</a>
            <a href="/onlineshop/cart">Cart</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="/onlineshop/admin">Admin Dashboard</a>
                <?php endif; ?>
                <a href="/onlineshop/logout">Logout</a>
            <?php else: ?>
                <a href="/onlineshop/login">Login</a>
                <a href="/onlineshop/register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <h1>Register</h1>
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/onlineshop/auth/register" method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/onlineshop/auth/login">Login here</a>.</p>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Online Shop</p>
    </footer>
</body>
</html>