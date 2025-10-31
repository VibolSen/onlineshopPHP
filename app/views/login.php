<?php require __DIR__ . '/partials/header.php'; ?>
    <main>
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/onlineshop/auth/login" method="POST" class="form-container">
            <div class="form-group">
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="/onlineshop/auth/register">Register here</a>.</p>
    </main>
<?php require __DIR__ . '/partials/footer.php'; ?>