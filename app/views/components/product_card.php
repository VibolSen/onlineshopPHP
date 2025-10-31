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

<style>
.product-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
}
.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}
.product-content {
    padding: 15px;
}
.product-content h3 {
    margin: 0 0 10px;
    font-size: 1.2em;
}
.product-content p.description {
    color: #666;
    font-size: 0.95em;
}
.product-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}
.product-footer .price {
    font-weight: 700;
    color: #007bff;
}
.product-footer .view-details {
    font-size: 0.9em;
    color: #e4e4e4ff;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background 0.3s ease;
}
.product-footer .view-details:hover {
    background: #007bff;
    color: #fff;
}
</style>
