<?php
require_once __DIR__ . '/../models/Product.php';

// Initialize Product class
$productObj = new Product();
$products = $productObj->getAllProducts();

$title = 'Home';
require __DIR__ . '/partials/header.php';
?>

<main class="container py-5">

    <!-- Banner Section -->
    <?php 
    // Optional: set variables for banner
    $bannerTitle = "Welcome to Our Online Shop!";
    $bannerSubtitle = "Find the best products at unbeatable prices.";
    require __DIR__ . '/components/banner.php'; 
    ?>

    <!-- Featured Products Section -->
    <h2 class="text-center mb-5 display-4 font-weight-bold">Featured Products</h2>

    <?php if (!empty($products)): ?>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 col-lg-3 mb-4">
                    <?php require __DIR__ . '/components/product_card.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-info text-center">No products available.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
