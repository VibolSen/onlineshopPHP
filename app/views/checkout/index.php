<?php require __DIR__ . '/../partials/header.php'; ?>

<main>
    <h1><?php echo $title; ?></h1>

    <?php if (!empty($cartItems)): ?>
        <div class="checkout-summary">
            <h2>Order Summary</h2>
            <?php foreach ($cartItems as $item): ?>
                <div class="checkout-item">
                    <p><?php echo $item['name']; ?> (x<?php echo $item['quantity']; ?>) - $<?php echo number_format($item['subtotal'], 2); ?></p>
                </div>
            <?php endforeach; ?>
            <h3>Total: $<?php echo number_format($totalPrice, 2); ?></h3>
        </div>

        <div class="checkout-form">
            <h2>Shipping Information</h2>
            <form action="/onlineshop/checkout/placeOrder" method="POST">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" name="zip" required>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </div>

                <h2>Payment Information</h2>
                <p>Payment Gateway Integration would go here.</p>
                <button type="submit">Place Order</button>
            </form>
        </div>
    <?php else: ?>
        <p>Your cart is empty. Please add some products before checking out.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
