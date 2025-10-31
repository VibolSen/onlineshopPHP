<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container mt-5 py-5">
    <h1 class="mb-5 text-center display-4 fw-bold text-gradient"><?php echo $title; ?></h1>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card product-card shadow-lg border-0 h-100">
                        <div class="product-image-wrapper position-relative overflow-hidden">
                            <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                                 class="card-img-top product-image" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <?php if ($product['stock'] <= 0): ?>
                                <span class="badge badge-danger position-absolute top-0 start-0 m-2 p-2 rounded-pill">Out of Stock</span>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate fw-semibold mb-2">
                                <a href="/onlineshop/products/show/<?php echo $product['id']; ?>" class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($product['name']); ?>
                                </a>
                            </h5>
                            <p class="text-muted mb-1">Category: 
                                <span class="badge badge-info"><?php echo htmlspecialchars($product['category_name']); ?></span>
                            </p>
                            <p class="card-text small text-secondary flex-grow-1">
                                <?php echo htmlspecialchars(substr($product['description'], 0, 70)) . '...'; ?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="h5 mb-0 text-primary fw-bold">$<?php echo number_format($product['price'], 2); ?></span>
                                <?php if ($product['stock'] > 0): ?>
                                    <form action="/onlineshop/cart/add" method="POST" class="d-flex align-items-center">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" 
                                               class="form-control form-control-sm me-1 text-center" style="width: 60px;">
                                        <button type="submit" class="btn btn-sm btn-gradient">Add</button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>Add</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center shadow-sm">No products found.</div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
