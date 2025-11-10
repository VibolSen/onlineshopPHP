<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Manage Orders</h5>
    </div>
    <div class="card-body">
        <form action="/onlineshop/admin/orders" method="GET" class="row g-3 mb-4">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Username" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-filter"></i></span>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Processing" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                        <option value="Shipped" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                        <option value="Delivered" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                        <option value="Cancelled" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th><a href="/onlineshop/admin/orders?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Order ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/orders?sort=username&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'username' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">User <?php if (isset($_GET['sort']) && $_GET['sort'] == 'username') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/orders?sort=total_amount&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'total_amount' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Total Amount <?php if (isset($_GET['sort']) && $_GET['sort'] == 'total_amount') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/orders?sort=status&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'status' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Status <?php if (isset($_GET['sort']) && $_GET['sort'] == 'status') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/orders?sort=created_at&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'created_at' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Order Date <?php if (isset($_GET['sort']) && $_GET['sort'] == 'created_at') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $status_classes = [
                        'Pending' => 'warning',
                        'Processing' => 'info',
                        'Shipped' => 'primary',
                        'Delivered' => 'success',
                        'Cancelled' => 'danger',
                    ];
                    ?>
                    <?php foreach ($orders as $order): ?>
                        <tr class="text-center align-middle">
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo htmlspecialchars($order['username']); ?></td>
                            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                            <td>
                                <span class="badge bg-<?php echo $status_classes[$order['status']] ?? 'secondary'; ?>">
                                    <?php echo htmlspecialchars($order['status']); ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y H:i', strtotime($order['order_date'])); ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal-<?php echo $order['id']; ?>">
                                    <i class="fas fa-edit me-1"></i> Edit Status
                                </button>
                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal-<?php echo $order['id']; ?>">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="/onlineshop/admin/orders?page=<?php echo $i; ?>&status=<?php echo htmlspecialchars($_GET['status'] ?? ''); ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>&sort=<?php echo htmlspecialchars($_GET['sort'] ?? ''); ?>&order=<?php echo htmlspecialchars($_GET['order'] ?? ''); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<?php foreach ($orders as $order): ?>
    <?php require 'edit.php'; ?>
    <?php require 'view.php'; ?>
<?php endforeach; ?>
