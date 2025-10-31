<?php 
$title = 'About Us';
require __DIR__ . '/../partials/header.php';
?>

<main class="about-page container mt-5 py-5">
    <section class="text-center fade-in">
        <h1 class="display-4 fw-bold text-gradient mb-4">About Our Online Shop</h1>
        <p class="lead text-muted mx-auto" style="max-width: 750px;">
            Welcome to <strong>OnlineShop</strong>, your one-stop destination for quality products and exceptional service.
            We're committed to giving you the best online shopping experience possible.
        </p>
    </section>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 col-lg-8 fade-in delay-1">
            <div class="card shadow-lg border-0 rounded-4 p-4 mb-5">
                <h2 class="fw-bold mb-3 text-primary">Our Mission</h2>
                <p>Our mission is to offer a wide range of high-quality products at competitive prices, paired with exceptional customer support. We make online shopping convenient, secure, and enjoyable for everyone.</p>
            </div>

            <div class="card shadow-lg border-0 rounded-4 p-4 mb-5">
                <h2 class="fw-bold mb-3 text-success">Our Story</h2>
                <p>Founded in <strong>[Year]</strong>, <strong>OnlineShop</strong> began with a simple goal: to make it easy for people to find and buy products they love. Thanks to our loyal customers, we’ve grown into a trusted online shopping destination.</p>
            </div>

            <div class="card shadow-lg border-0 rounded-4 p-4 mb-5">
                <h2 class="fw-bold mb-3 text-danger">Why Choose Us?</h2>
                <ul class="list-unstyled fs-5">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Quality Products:</strong> Every item is carefully selected.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Affordable Prices:</strong> Great value without compromise.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Secure Shopping:</strong> Your privacy is our priority.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Fast Shipping:</strong> Quick and reliable delivery.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Excellent Support:</strong> Friendly team always ready to help.</li>
                </ul>
            </div>

            <div class="text-center fade-in delay-2">
                <p class="fs-5 fw-medium text-muted">Thank you for choosing <span class="text-primary fw-bold">OnlineShop</span>. We look forward to serving you!</p>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
