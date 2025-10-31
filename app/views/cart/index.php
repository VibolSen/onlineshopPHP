<?php require __DIR__ . '/../partials/header.php'; ?>

<main>
    <h1><?php echo $title; ?></h1>

    <?php if (!empty($cartItems)): ?>
        <div class="cart-items">
            <?php foreach ($cartItems as $item): ?>
                <div class="cart-item">
                    <h3><?php echo $item['name']; ?></h3>
                    <?php if (!empty($item['image'])): ?>
                        <img src="/onlineshop/assets/images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" width="50">
                    <?php endif; ?>
                    <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
                    <form action="/onlineshop/cart/update" method="POST" class="inline-form">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <label for="quantity-<?php echo $item['id']; ?>">Quantity:</label>
                        <input type="number" id="quantity-<?php echo $item['id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" onchange="this.form.submit()">
                    </form>
                    <p>Subtotal: $<?php echo number_format($item['subtotal'], 2); ?></p>
                    <form action="/onlineshop/cart/remove" method="POST" class="inline-form">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-summary">
            <h2>Total: $<?php echo number_format($totalPrice, 2); ?></h2>
            <form action="/onlineshop/cart/clear" method="POST">
                <button type="submit">Clear Cart</button>
            </form>
            <a href="/onlineshop/checkout" class="button">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
