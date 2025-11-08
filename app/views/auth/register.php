<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="d-flex flex-column align-items-center justify-content-center min-vh-100 bg-light">
    <div class="text-center p-5 bg-white shadow rounded" style="max-width: 600px;">
        <h1 class="mb-4 text-primary">Create Account</h1>
        <form action="/onlineshop/auth/register" method="POST" class="fancy-form">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
        </form>
        <p class="mt-3 mb-0">
            Already have an account? 
            <a href="/onlineshop/auth/login" class="text-decoration-none fw-bold">Login here</a>.
        </p>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
