<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center p-3 bg-white">
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
                        <a href="#" class="text-decoration-none fw-bold" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Register here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>