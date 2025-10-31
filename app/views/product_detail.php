<?php
require_once __DIR__ . '/../models/Product.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger text-center mt-5'>Product not found!</div>";
    exit;
}

$productId = (int)$_GET['id'];
$productObj = new Product();
$product = $productObj->getProductById($productId);

if (!$product) {
    echo "<div class='alert alert-danger text-center mt-5'>Product not found!</div>";
    exit;
}

$title = htmlspecialchars($product['name']);
require __DIR__ . '/partials/header.php';
?>

<main class="container py-5">
    <div class="product-detail-card shadow-lg rounded-4 p-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="img-fluid rounded-4 product-detail-image shadow-sm">
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bold text-dark mb-3"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="text-muted mb-2">Category: 
                    <span class="badge badge-info"><?php echo htmlspecialchars($product['category_name']); ?></span>
                </p>
                <p class="text-secondary lead mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
                <h3 class="text-primary fw-bold mb-3">$<?php echo number_format($product['price'], 2); ?></h3>

                <p><strong>Stock:</strong> 
                    <?php if ($product['stock'] > 0): ?>
                        <span class="text-success"><?php echo $product['stock']; ?> available</span>
                    <?php else: ?>
                        <span class="text-danger">Out of stock</span>
                    <?php endif; ?>
                </p>

                <?php if ($product['stock'] > 0): ?>
                    <form action="/onlineshop/cart/add" method="POST" class="d-flex align-items-center mt-3">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" 
                               class="form-control me-2 text-center" style="width: 80px;">
                        <button type="submit" class="btn btn-gradient px-4 py-2">Add to Cart</button>
                    </form>
                <?php endif; ?>

                <div class="mt-4">
                    <a href="/onlineshop/products" class="btn btn-outline-secondary rounded-pill px-4">
                        ← Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
