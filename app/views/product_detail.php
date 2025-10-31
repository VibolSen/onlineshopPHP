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

<div class="product-detail" style="max-width:800px; margin:40px auto; padding:20px; background:#fff; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.08); text-align:center;">
    <h1><?php echo $product['name']; ?></h1>
    <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
         alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:400px; max-width:100%; border-radius:10px; margin-bottom:20px;">
    <p><strong>Category:</strong> <?php echo $product['category_name']; ?></p>
    <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
    <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
    <p><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
    <a href="home.php" style="display:inline-block;margin-top:20px;padding:10px 20px;background:#007bff;color:#fff;border-radius:8px;text-decoration:none;">Back to Products</a>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
