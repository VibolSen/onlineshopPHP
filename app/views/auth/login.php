<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="d-flex flex-column align-items-center justify-content-center min-vh-100 bg-light">
    <div class="text-center p-5 bg-white shadow rounded" style="max-width: 600px;">
        <?php if (isset($_GET['redirect']) && $_GET['redirect'] === 'cart'): ?>
            <div class="alert alert-info" role="alert">
                You need to be logged in to add items to your cart.
            </div>
        <?php endif; ?>
        <h1 class="mb-4 text-primary">Login</h1>
        <form action="/onlineshop/auth/login" method="POST" class="fancy-form">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100 py-2">Login</button>
        </form>
        <p class="mt-3 mb-0">
            Don’t have an account? 
            <a href="/onlineshop/auth/register" class="text-decoration-none fw-bold">Register here</a>.
        </p>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
