<?php require __DIR__ . '/partials/header.php'; ?>
    <main>
        <h1>Register</h1>
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/onlineshop/auth/register" method="POST" class="form-container">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/onlineshop/auth/login">Login here</a>.</p>
    </main>
<?php require __DIR__ . '/partials/footer.php'; ?>