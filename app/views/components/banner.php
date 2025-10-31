<?php
// components/banner.php
$bannerTitle = $bannerTitle ?? "Welcome to OnlineShop!";
$bannerSubtitle = $bannerSubtitle ?? "Quality products delivered to your doorstep";
$bannerButtonText = $bannerButtonText ?? "Shop Now";
$bannerButtonLink = $bannerButtonLink ?? "/onlineshop/products";
?>





<div class="banner">
    <h1><?php echo htmlspecialchars($bannerTitle); ?></h1>
    <p><?php echo htmlspecialchars($bannerSubtitle); ?></p>
    <a href="<?php echo htmlspecialchars($bannerButtonLink); ?>">
        <?php echo htmlspecialchars($bannerButtonText); ?>
    </a>
</div>
