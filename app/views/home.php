<?php
require_once __DIR__ . '/../models/Product.php';

// Initialize Product class
$productObj = new Product();
$products = $productObj->getAllProducts();

$title = 'Home';
require __DIR__ . '/partials/header.php';
?>

<main class="container">

    <!-- Banner Section -->
    <?php 
    // Optional: set variables for banner
    $bannerTitle = "Welcome to Our Online Shop!";
    $bannerSubtitle = "Find the best products at unbeatable prices.";
    require __DIR__ . '/components/banner.php'; 
    ?>

    <!-- Featured Products Section -->
    <h2 style="text-align:center; margin:40px 0 20px;">Featured Products</h2>

    <?php if (!empty($products)): ?>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php require __DIR__ . '/components/product_card.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align:center;">No products available.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
