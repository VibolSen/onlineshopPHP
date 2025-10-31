<?php require __DIR__ . '/partials/header.php'; ?>
    <main>
        <?php if (isset($product) && !empty($product)): ?>
            <h1><?php echo $product['name']; ?></h1>
            <div class="product-detail">
                <?php if (!empty($product['image'])): ?>
                    <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="300">
                <?php endif; ?>
                <p><strong>Category:</strong> <?php echo $product['category_name']; ?></p>
                <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
                <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                <?php if ($product['stock'] > 0): ?>
                    <p><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
                    <form action="/onlineshop/cart/add" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>">
                        <button type="submit">Add to Cart</button>
                    </form>
                <?php else: ?>
                    <p class="error-message"><strong>Out of Stock</strong></p>
                    <button type="button" disabled>Add to Cart</button>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </main>
<?php require __DIR__ . '/partials/footer.php'; ?>