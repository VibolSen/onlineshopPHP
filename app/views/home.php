<?php
require_once __DIR__ . '/../models/Product.php';

// Initialize Product class
$productObj = new Product();
$products = $productObj->getAllProducts();

$title = 'Home';
require __DIR__ . '/partials/header.php';
?>

<main class="home-page">

    <!-- 🌟 Hero Banner -->
    <section class="hero-banner d-flex justify-content-center align-items-center text-center text-white">
        <div class="overlay"></div>
        <div class="container position-relative z-2">
            <h1 class="display-3 fw-bold mb-3"><?php echo $bannerTitle ?? 'Welcome to Our Online Shop!'; ?></h1>
            <p class="lead mb-4"><?php echo $bannerSubtitle ?? 'Find the best products at unbeatable prices.'; ?></p>
            <a href="<?php echo BASE_URL; ?>products" class="btn btn-warning btn-lg shadow">
                <i class="bi bi-bag-check"></i> Shop Now
            </a>
        </div>
    </section>

    <!-- 🛍️ Featured Products -->
    <section class="container py-5">
        <h2 class="text-center mb-5 display-4 text-gradient">Featured Products</h2>

        <?php if (!empty($products)): ?>
            <div class="row g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col-6 col-md-4 col-lg-3">
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
/* ===== Home Page Styling ===== */

/* Hero Banner */
.hero-banner {
    position: relative;
    min-height: 55vh;
    max-height: 70vh;
    background: url('<?php echo BASE_URL; ?>assets/images/banner-bg.jpg') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}

.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(43, 16, 85, 0.6);
    z-index: 1;
}

.hero-banner h1,
.hero-banner p,
.hero-banner .btn {
    position: relative;
    z-index: 2;
}

/* Gradient Text */
.text-gradient {
    background: linear-gradient(45deg, #007bff, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Fade-in Animations */
.hero-banner h1, .hero-banner p, .hero-banner .btn {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease forwards;
}

.hero-banner h1 { animation-delay: 0.2s; }
.hero-banner p { animation-delay: 0.5s; }
.hero-banner .btn { animation-delay: 0.8s; }

@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}

/* Product Cards */
.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    height: 100%; /* Full column height */
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.card img {
    max-height: 200px;
    object-fit: cover;
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

/* Page Background */
.home-page {
    background: linear-gradient(to bottom right, #f8f9fa, #eef2ff);
}
</style>
