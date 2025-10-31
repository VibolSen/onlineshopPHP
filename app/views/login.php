<?php require __DIR__ . '/partials/header.php'; ?>
    <main>
        <button onclick="openModal(`
            <form action='/onlineshop/auth/login' method='POST' class='form-container'>
                <h2>Login</h2>
                <?php if (isset($error)): ?>
                    <p class='error-message'><?php echo $error; ?></p>
                <?php endif; ?>
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
        `)">Open Login Form</button>
        <p>Don't have an account? <a href="#" onclick="openModal(`
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
        `)">Register here</a>.</p>
    </main>
<?php require __DIR__ . '/partials/footer.php'; ?>