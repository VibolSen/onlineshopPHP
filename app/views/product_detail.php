<?php
require_once __DIR__ . '/../models/Product.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Product not found!";
    exit;
}

$productId = (int)$_GET['id'];
$productObj = new Product();
$product = $productObj->getProductById($productId);

if (!$product) {
    echo "Product not found!";
    exit;
}

$title = htmlspecialchars($product['name']);
require __DIR__ . '/partials/header.php';
?>

<div class="product-detail product-detail-container">
    <h1><?php echo $product['name']; ?></h1>
    <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
         alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-detail-image">
    <p><strong>Category:</strong> <?php echo $product['category_name']; ?></p>
    <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
    <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
    <p><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
    <a href="home.php" class="back-to-products-link">Back to Products</a>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
