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
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0 align-items-center">
            <!-- Product Image -->
            <div class="col-md-6 bg-light text-center p-4">
                <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>"
                     alt="<?php echo htmlspecialchars($product['name']); ?>"
                     class="img-fluid rounded-4 shadow-sm"
                     style="max-height: 400px; object-fit: contain;">
            </div>

            <!-- Product Info -->
            <div class="col-md-6 p-5">
                <h1 class="display-5 fw-bold text-dark mb-3"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="mb-2">
                    <span class="fw-semibold text-muted">Category:</span>
                    <span class="badge bg-info-subtle text-info-emphasis px-3 py-2">
                        <?php echo htmlspecialchars($product['category_name']); ?>
                    </span>
                </p>
                <p class="text-secondary fs-5 mt-3"><?php echo htmlspecialchars($product['description']); ?></p>
                <h3 class="text-primary fw-bold mt-4 mb-3">$<?php echo number_format($product['price'], 2); ?></h3>

                <!-- Stock Info -->
                <p class="mb-4">
                    <strong>Stock:</strong>
                    <?php if ($product['stock'] > 0): ?>
                        <span class="text-success fw-semibold"><?php echo $product['stock']; ?> available</span>
                    <?php else: ?>
                        <span class="text-danger fw-semibold">Out of stock</span>
                    <?php endif; ?>
                </p>

                <!-- Add to Cart Form -->
                <?php if ($product['stock'] > 0): ?>
                    <form action="/onlineshop/cart/add" method="POST" class="d-flex align-items-center mb-4">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               max="<?php echo $product['stock']; ?>"
                               class="form-control text-center me-3"
                               style="width: 80px;">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                            <i class="fas fa-cart-plus me-2"></i> Add to Cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="btn btn-secondary btn-lg rounded-pill px-4" disabled>
                        <i class="fas fa-ban me-2"></i> Out of Stock
                    </button>
                <?php endif; ?>

                <!-- Back Button -->
                <a href="/onlineshop/products" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-1"></i> Back to Products
                </a>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
