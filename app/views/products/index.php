<?php require __DIR__ . '/../partials/header.php'; ?>
<main>
        <h1><?php echo $title; ?></h1>
        <div class="product-list">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <h3><a href="/onlineshop/products/show/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
                        <p>Category: <?php echo $product['category_name']; ?></p>
                        <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                        <?php if (!empty($product['image'])): ?>
                            <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="100">
                        <?php endif; ?>
                        <p><?php echo substr($product['description'], 0, 100); ?>...</p>
                        <?php if ($product['stock'] > 0): ?>
                            <p>Stock: <?php echo $product['stock']; ?></p>
                            <form action="/onlineshop/cart/add" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" style="width: 50px;">
                                <button type="submit">Add to Cart</button>
                            </form>
                        <?php else: ?>
                            <p style="color: red;">Out of Stock</p>
                            <button type="button" disabled>Add to Cart</button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </main>
<?php require __DIR__ . '/../partials/footer.php'; ?>