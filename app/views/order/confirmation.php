<?php require __DIR__ . '/../partials/header.php'; ?>

<main>
    <h1><?php echo $title; ?></h1>

    <?php if (isset($order) && !empty($order)): ?>
        <div class="order-confirmation">
            <p>Thank you for your order!</p>
            <p>Your order #<strong><?php echo $order['id']; ?></strong> has been placed successfully.</p>
            <p>Total Amount: $<?php echo number_format($order['total_amount'], 2); ?></p>
            <p>Status: <?php echo ucfirst($order['status']); ?></p>
            <p>We will send you an email with the details of your order.</p>
            <a href="/onlineshop/products">Continue Shopping</a>
        </div>
    <?php else: ?>
        <p>Order not found or an error occurred.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
