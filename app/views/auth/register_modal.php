<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center p-3 bg-white">
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
                        <a href="#" class="text-decoration-none fw-bold" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>