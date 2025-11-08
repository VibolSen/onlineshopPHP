<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container my-5">
    <h1 class="text-center mb-5 fw-bold text-primary"><?php echo $title; ?></h1>

    <?php if (!empty($cartItems)): ?>
        <div class="row g-4">
            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <h2 class="h5 mb-4 text-secondary text-center">Order Summary</h2>
                    <ul class="list-group mb-3">
                        <?php foreach ($cartItems as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center rounded-3">
                                <span><?php echo $item['name']; ?> (x<?php echo $item['quantity']; ?>)</span>
                                <span class="fw-bold text-primary">$<?php echo number_format($item['subtotal'], 2); ?></span>
                            </li>
                        <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center rounded-3 fw-bold bg-light">
                            <span>Total</span>
                            <span class="text-success">$<?php echo number_format($totalPrice, 2); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <h2 class="h5 mb-4 text-secondary text-center">Shipping Information</h2>
                    <form action="/onlineshop/checkout/placeOrder" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold">Address</label>
                            <input type="text" class="form-control rounded-pill" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label fw-semibold">City</label>
                            <input type="text" class="form-control rounded-pill" id="city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label fw-semibold">Zip Code</label>
                            <input type="text" class="form-control rounded-pill" id="zip" name="zip" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label fw-semibold">Country</label>
                            <input type="text" class="form-control rounded-pill" id="country" name="country" required>
                        </div>

                        <h2 class="h5 mt-4 mb-3 text-secondary text-center">Payment Information</h2>
                        <div class="mb-4 p-3 bg-light rounded-3 text-center">
                            <p class="mb-0">Payment Gateway Integration would go here.</p>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center shadow-sm rounded-4 py-4">
            <h4 class="mb-2">Your cart is empty 😢</h4>
            <p class="mb-0">Please add some products before checking out. <a href="/onlineshop/products" class="fw-bold alert-link">Browse Products</a></p>
        </div>
    <?php endif; ?>
</main>

<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }
</style>

<?php require __DIR__ . '/../partials/footer.php'; ?>
