<?php require_once __DIR__ . '/../../controllers/Controller.php'; ?>
<div class="row g-4">
    <!-- Dashboard Metrics -->
    <div class="col-md-4">
        <div class="card text-white bg-primary shadow-sm rounded-4">
            <div class="card-header fw-bold"><?php echo Controller::_t('total_users'); ?></div>
            <div class="card-body d-flex align-items-center justify-content-between">
                <h3 class="card-title mb-0"><i class="fas fa-users me-2"></i> <?php echo $totalUsers; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success shadow-sm rounded-4">
            <div class="card-header fw-bold"><?php echo Controller::_t('total_products'); ?></div>
            <div class="card-body d-flex align-items-center justify-content-between">
                <h3 class="card-title mb-0"><i class="fas fa-box me-2"></i> <?php echo $totalProducts; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info shadow-sm rounded-4">
            <div class="card-header fw-bold"><?php echo Controller::_t('total_orders'); ?></div>
            <div class="card-body d-flex align-items-center justify-content-between">
                <h3 class="card-title mb-0"><i class="fas fa-shopping-cart me-2"></i> <?php echo $totalOrders; ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Recent Users -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-secondary text-white fw-bold"><?php echo Controller::_t('recent_users'); ?></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th><?php echo Controller::_t('id'); ?></th>
                            <th><?php echo Controller::_t('username'); ?></th>
                            <th><?php echo Controller::_t('email'); ?></th>
                            <th><?php echo Controller::_t('role'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <span class="badge bg-primary text-uppercase"><?php echo $user['role']; ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Recent Products -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-secondary text-white fw-bold"><?php echo Controller::_t('recent_products'); ?></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th><?php echo Controller::_t('id'); ?></th>
                            <th><?php echo Controller::_t('name'); ?></th>
                            <th><?php echo Controller::_t('price'); ?></th>
                            <th><?php echo Controller::_t('stock'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td>$<?php echo number_format($product['price'], 2); ?></td>
                                <td><?php echo $product['stock']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-secondary text-white fw-bold"><?php echo Controller::_t('recent_orders'); ?></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th><?php echo Controller::_t('id'); ?></th>
                            <th><?php echo Controller::_t('user'); ?></th>
                            <th><?php echo Controller::_t('total'); ?></th>
                            <th><?php echo Controller::_t('status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['user_id']; ?></td>
                                <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                                <td>
                                    <?php 
                                        $statusClass = match($order['status']) {
                                            'pending' => 'bg-warning',
                                            'completed' => 'bg-success',
                                            'cancelled' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                    ?>
                                    <span class="badge <?php echo $statusClass; ?> text-white text-uppercase"><?php echo Controller::_t($order['status']); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
