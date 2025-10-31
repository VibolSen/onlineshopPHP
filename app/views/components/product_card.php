<!-- product_card.php -->
<div class="card h-100 shadow-sm product-card-hover">
    <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
         class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-truncate"><?php echo htmlspecialchars($product['name']); ?></h5>
        <p class="card-text flex-grow-1 text-muted"><?php echo htmlspecialchars(substr($product['description'], 0, 100)) . '...'; ?></p>
        <div class="mb-2">
            <?php if ($product['stock'] > 0): ?>
                <span class="badge badge-success">In Stock: <?php echo htmlspecialchars($product['stock']); ?></span>
            <?php else: ?>
                <span class="badge badge-danger">No Stock</span>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-auto">
            <span class="h5 mb-0 text-primary">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></span>
            <a href="/onlineshop/product/show/<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">View Details</a>
        </div>
    </div>
</div>

<style>
    .product-card-hover {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .product-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
