<?php require __DIR__ . '/../partials/header.php'; ?>
<main class="container mt-5">
        <h1 class="mb-4 display-4 text-center"><?php echo $title; ?></h1>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm product-card-hover">
                            <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                                 class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate"><a href="/onlineshop/products/show/<?php echo $product['id']; ?>" class="text-dark"><?php echo $product['name']; ?></a></h5>
                                <p class="card-text text-muted">Category: <span class="badge badge-info"><?php echo $product['category_name']; ?></span></p>
                                <p class="card-text flex-grow-1"><?php echo htmlspecialchars(substr($product['description'], 0, 70)) . '...'; ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="h5 mb-0 text-primary">$<?php echo number_format($product['price'], 2); ?></span>
                                    <?php if ($product['stock'] > 0): ?>
                                        <form action="/onlineshop/cart/add" method="POST" class="form-inline">
                                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                            <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" class="form-control form-control-sm mr-1" style="width: 60px;">
                                            <button type="submit" class="btn btn-success btn-sm">Add</button>
                                        </form>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Out of Stock</span>
                                        <button type="button" class="btn btn-danger btn-sm" disabled>Add</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="alert alert-warning text-center">No products found.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
<?php require __DIR__ . '/../partials/footer.php'; ?>