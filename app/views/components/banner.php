<?php
// components/banner.php
$bannerTitle = $bannerTitle ?? "Welcome to OnlineShop!";
$bannerSubtitle = $bannerSubtitle ?? "Quality products delivered to your doorstep";
$bannerButtonText = $bannerButtonText ?? "Shop Now";
$bannerButtonLink = $bannerButtonLink ?? "/onlineshop/products";
?>

<style>
/* Option 2: Vibrant & Gradient-Powered */
.banner {
    position: relative; /* Needed for positioning the shapes */
    padding: 60px 40px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    border-radius: 15px;
    margin-bottom: 40px;
    text-align: center;
    overflow: hidden;
    box-sizing: border-box;
}

.banner h1 {
    font-size: 3rem;
    font-weight: 700;
    margin: 0 0 10px;
    position: relative;
    z-index: 2;
}

.banner p {
    font-size: 1.25rem;
    margin: 0 0 25px;
    font-weight: 400;
    opacity: 0.9;
    position: relative;
    z-index: 2;
}

.banner a {
    display: inline-block;
    padding: 12px 30px;
    background-color: #ffffff;
    color: #667eea;
    text-decoration: none;
    font-weight: 700;
    border-radius: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    position: relative;
    z-index: 2;
}

.banner a:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Animated shapes in the background */
.banner-shapes {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 1;
}
.banner-shapes::before, .banner-shapes::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 10s infinite ease-in-out;
}
.banner-shapes::before {
    width: 200px; height: 200px;
    bottom: -50px; left: -50px;
}
.banner-shapes::after {
    width: 150px; height: 150px;
    top: -40px; right: -40px;
    animation-delay: 2s; /* Start at a different time */
}

@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}
</style>



<div class="banner">
    <h1><?php echo htmlspecialchars($bannerTitle); ?></h1>
    <p><?php echo htmlspecialchars($bannerSubtitle); ?></p>
    <a href="<?php echo htmlspecialchars($bannerButtonLink); ?>">
        <?php echo htmlspecialchars($bannerButtonText); ?>
    </a>
</div>
