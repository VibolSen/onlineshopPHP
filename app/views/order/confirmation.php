<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container my-5">
    <?php if (isset($order) && !empty($order)): ?>
        <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">
            <div class="card-body text-center p-5">
                <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
                <h1 class="card-title mb-3 fw-bold text-primary">Thank You!</h1>
                <p class="mb-2">Your order <strong>#<?php echo $order['id']; ?></strong> has been placed successfully.</p>
                <p class="mb-2">Total Amount: <span class="fw-bold text-success">$<?php echo number_format($order['total_amount'], 2); ?></span></p>
                <p class="mb-3">Status: 
                    <?php 
                        $statusClass = $order['status'] === 'pending' ? 'badge bg-warning' : ($order['status'] === 'completed' ? 'badge bg-success' : 'badge bg-secondary'); 
                    ?>
                    <span class="<?php echo $statusClass; ?>"><?php echo ucfirst($order['status']); ?></span>
                </p>
                <p class="mb-4">We will send you an email with the details of your order shortly.</p>
                <a href="/onlineshop/products" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">
                    Continue Shopping
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center shadow-sm rounded-4 py-4">
            <h4 class="mb-2">Order not found 😢</h4>
            <p class="mb-0">An error occurred or the order does not exist. <a href="/onlineshop/products" class="fw-bold alert-link">Browse Products</a></p>
        </div>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
