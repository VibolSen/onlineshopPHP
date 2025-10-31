<?php require __DIR__ . '/../partials/header.php'; ?>
    <main class="container mt-5">
        <?php if (isset($product) && !empty($product)): ?>
            <div class="row">
                <div class="col-md-6">
                    <?php if (!empty($product['image'])): ?>
                        <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" class="img-fluid rounded shadow-sm" alt="<?php echo $product['name']; ?>">
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h1 class="mb-3 display-4"><?php echo $product['name']; ?></h1>
                    <p class="lead"><strong>Category:</strong> <span class="badge badge-secondary"><?php echo $product['category_name']; ?></span></p>
                    <h2 class="text-primary mb-3">$<?php echo number_format($product['price'], 2); ?></h2>
                    <p class="text-muted"><?php echo $product['description']; ?></p>
                    
                    <?php if ($product['stock'] > 0): ?>
                        <p><strong>Availability:</strong> <span class="text-success">In Stock (<?php echo $product['stock']; ?>)</span></p>
                        <form action="/onlineshop/cart/add" method="POST" class="form-inline mt-4">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="form-group mr-2">
                                <label for="quantity" class="sr-only">Quantity</label>
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" class="form-control" style="width: 80px;">
                            </div>
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                    <?php else: ?>
                        <p class="alert alert-danger"><strong>Out of Stock</strong></p>
                        <button type="button" class="btn btn-danger mt-3" disabled>Add to Cart</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                Product not found.
            </div>
        <?php endif; ?>
    </main>
<?php require __DIR__ . '/../partials/footer.php'; ?>