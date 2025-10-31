<?php
// components/banner.php
$bannerTitle = $bannerTitle ?? "Welcome to OnlineShop!";
$bannerSubtitle = $bannerSubtitle ?? "Quality products delivered to your doorstep";
$bannerButtonText = $bannerButtonText ?? "Shop Now";
$bannerButtonLink = $bannerButtonLink ?? "/onlineshop/products";
?>

<div class="jumbotron jumbotron-fluid text-center bg-primary text-white rounded-lg shadow-lg py-5">
    <div class="container">
        <h1 class="display-3 font-weight-bold mb-3"><?php echo htmlspecialchars($bannerTitle); ?></h1>
        <p class="lead mb-4"><?php echo htmlspecialchars($bannerSubtitle); ?></p>
        <a class="btn btn-light btn-lg" href="<?php echo htmlspecialchars($bannerButtonLink); ?>" role="button">
            <?php echo htmlspecialchars($bannerButtonText); ?>
        </a>
    </div>
</div>
