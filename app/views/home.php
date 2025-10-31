<?php
require_once __DIR__ . '/../models/Product.php';

// Initialize Product class
$productObj = new Product();
$products = $productObj->getAllProducts();

$title = 'Home';
require __DIR__ . '/partials/header.php';
?>

<main class="home-page container-fluid px-0">

    <!-- 🌟 Hero Banner Section -->
    <section class="hero-banner d-flex flex-column justify-content-center align-items-center text-center text-white">
        <div class="banner-overlay"></div>
        <div class="banner-content">
            <h1 class="display-3 fw-bold mb-3 fade-in"><?php echo $bannerTitle ?? 'Welcome to Our Online Shop!'; ?></h1>
            <p class="lead mb-4 fade-in delay-1"><?php echo $bannerSubtitle ?? 'Find the best products at unbeatable prices.'; ?></p>
            <a href="<?php echo BASE_URL; ?>products" class="btn btn-lg btn-warning shadow-sm fade-in delay-2">
                <i class="bi bi-bag-check"></i> Shop Now
            </a>
        </div>
    </section>

    <!-- 🛍️ Featured Products Section -->
    <section class="container py-5">
        <h2 class="text-center mb-5 display-4 font-weight-bold text-gradient">Featured Products</h2>

        <?php if (!empty($products)): ?>
            <div class="row justify-content-center">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 col-lg-3 mb-4 fade-in delay-1">
                        <?php require __DIR__ . '/components/product_card.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="alert alert-info text-center">No products available.</p>
        <?php endif; ?>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>

<style>
/* ===== Fancy Home Page Styling ===== */

/* Hero Banner */
.hero-banner {
    position: relative;
    height: 80vh;
    background: url('<?php echo BASE_URL; ?>assets/images/banner-bg.jpg') center/cover no-repeat;
    overflow: hidden;
}

.banner-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(43, 16, 85, 0.6);
    z-index: 1;
}

.banner-content {
    position: relative;
    z-index: 2;
    max-width: 700px;
    padding: 0 15px;
}

.text-gradient {
    background: linear-gradient(45deg, #007bff, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Fade-in animations */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease forwards;
}
.fade-in.delay-1 { animation-delay: 0.4s; }
.fade-in.delay-2 { animation-delay: 0.8s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Product Section Background */
.home-page {
    background: linear-gradient(to bottom right, #f8f9fa, #eef2ff);
}

/* Product Cards */
.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Buttons */
.btn-warning {
    background-color: #ffd369;
    border: none;
    color: #2b1055;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background-color: #fbc531;
    transform: translateY(-2px);
}
</style>
