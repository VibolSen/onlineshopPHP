<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container my-5">
    <h1 class="mb-5 text-center fw-bold text-primary"><?php echo $title; ?></h1>

    <?php if (!empty($cartItems)): ?>
        <div class="row g-4">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <?php foreach ($cartItems as $item): ?>
                    <div class="card mb-3 shadow-lg border-0 rounded-4 hover-shadow">
                        <div class="row g-0 align-items-center p-3">
                            <div class="col-md-2 col-4">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="/onlineshop/assets/images/<?php echo $item['image']; ?>" class="img-fluid rounded-3 border" alt="<?php echo $item['name']; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-10 col-8">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center p-0 ps-3">
                                    <div class="flex-grow-1 mb-2 mb-md-0">
                                        <h5 class="card-title mb-1 fw-semibold"><?php echo $item['name']; ?></h5>
                                        <p class="card-text text-muted mb-1">Price: <span class="text-success fw-bold">$<?php echo number_format($item['price'], 2); ?></span></p>
                                        <p class="card-text fw-bold mb-0">Subtotal: <span class="text-primary">$<?php echo number_format($item['subtotal'], 2); ?></span></p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
                                        <form action="/onlineshop/cart/update" method="POST" class="d-flex align-items-center gap-2">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <label for="quantity-<?php echo $item['id']; ?>" class="me-1 mb-0">Qty:</label>
                                            <input type="number" id="quantity-<?php echo $item['id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control form-control-sm text-center" style="width: 70px;" onchange="this.form.submit()">
                                        </form>
                                        <form action="/onlineshop/cart/remove" method="POST">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                                <i class="bi bi-trash"></i> Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <h2 class="card-title h4 mb-4 text-center text-secondary">Cart Summary</h2>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center rounded-3">
                            <span>Total:</span>
                            <span class="fw-bold text-primary fs-5">$<?php echo number_format($totalPrice, 2); ?></span>
                        </li>
                    </ul>
                    <div class="d-grid gap-3">
                        <a href="/onlineshop/checkout" class="btn btn-primary btn-lg rounded-pill fw-semibold shadow-sm">Proceed to Checkout</a>
                        <form action="/onlineshop/cart/clear" method="POST" class="d-grid">
                            <button type="submit" class="btn btn-outline-secondary btn-lg rounded-pill fw-semibold">Clear Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center py-4 shadow-sm rounded-4" role="alert">
            <h4 class="mb-2">Your cart is empty 😢</h4>
            <p class="mb-0">Start shopping now! <a href="/onlineshop/products" class="alert-link fw-bold">Browse Products</a></p>
        </div>
    <?php endif; ?>
</main>

<style>
    /* Hover shadow effect for cards */
    .hover-shadow:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15) !important;
    }
</style>

<?php require __DIR__ . '/../partials/footer.php'; ?>
