<!-- product_card.php -->
<div class="product-card">
    <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
         alt="<?php echo htmlspecialchars($product['name']); ?>">
    <div class="product-content">
        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
        <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
        <div class="product-footer">
            <span class="price">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></span>
            <!-- Only this link is clickable -->
            <a class="view-details" href="/onlineshop/product/show/<?php echo $product['id']; ?>">View Details</a>
        </div>
    </div>
</div>


