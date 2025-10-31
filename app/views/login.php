<?php require __DIR__ . '/partials/header.php'; ?>

<main class="d-flex flex-column align-items-center justify-content-center min-vh-100 bg-light">
    <div class="text-center p-5 bg-white shadow rounded" style="max-width: 600px;">
        <h1 class="mb-4 text-primary">Welcome to OnlineShop</h1>
        <p class="lead mb-4">Join us and start your online shopping journey today!</p>

        <button 
            class="btn btn-primary btn-lg px-4 mb-3" 
            onclick="openModal(`<?php echo addslashes("
                <form action='/onlineshop/auth/login' method='POST' class=\"fancy-form\">
                    <h2 class='mb-4 text-center text-primary'>Login</h2>
                    <div class='form-group mb-3'>
                        <label for='username'>Username</label>
                        <input type='text' id='username' name='username' class='form-control' required>
                    </div>
                    <div class='form-group mb-4'>
                        <label for='password'>Password</label>
                        <input type='password' id='password' name='password' class='form-control' required>
                    </div>
                    <button type='submit' class='btn btn-success w-100 py-2'>Login</button>
                </form>
            "); ?>`)">
            Login
        </button>

        <p class="mt-3 mb-0">
            Don’t have an account? 
            <a href="#" class="text-decoration-none fw-bold" onclick="openModal(`<?php echo addslashes("
                <form action='/onlineshop/auth/register' method='POST' class=\"fancy-form\">
                    <h2 class='mb-4 text-center text-primary'>Create Account</h2>
                    <div class='form-group mb-3'>
                        <label for='username'>Username</label>
                        <input type='text' id='username' name='username' class='form-control' required>
                    </div>
                    <div class='form-group mb-3'>
                        <label for='email'>Email</label>
                        <input type='email' id='email' name='email' class='form-control' required>
                    </div>
                    <div class='form-group mb-4'>
                        <label for='password'>Password</label>
                        <input type='password' id='password' name='password' class='form-control' required>
                    </div>
                    <button type='submit' class='btn btn-primary w-100 py-2'>Register</button>
                </form>
            "); ?>`)">
            Register here
            </a>.
        </p>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
