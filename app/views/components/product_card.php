<!-- product_card.php -->
<?php require_once __DIR__ . '/../../controllers/Controller.php'; // Ensure Controller is loaded for _t() ?>
<div class="card h-100 shadow-sm product-card-hover">
    <img src="/onlineshop/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
         class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-truncate"><?php echo htmlspecialchars($product['name']); ?></h5>
        <p class="card-text flex-grow-1 text-muted"><?php echo htmlspecialchars(substr($product['description'], 0, 100)) . '...'; ?></p>
        <div class="mb-2">
            <?php if ($product['stock'] > 0): ?>
                <span class="badge badge-success"><?php echo Controller::_t('in_stock'); ?>: <?php echo htmlspecialchars($product['stock']); ?></span>
            <?php else: ?>
                <span class="badge badge-danger"><?php echo Controller::_t('no_stock'); ?></span>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-auto">
            <span class="h5 mb-0 text-primary">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></span>
            <div>
                <a href="/onlineshop/product/show/<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm"><?php echo Controller::_t('view_details'); ?></a>
                <form action="/onlineshop/cart/add" method="POST" class="d-inline">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" class="btn btn-primary btn-sm" <?php echo $product['stock'] > 0 ? '' : 'disabled'; ?>>
                        <i class="bi bi-cart-plus"></i> <?php echo Controller::_t('add_to_cart'); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .product-card-hover {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .product-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
