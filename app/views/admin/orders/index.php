<div class="row mb-3">
    <div class="col-md-6">
        <form action="/onlineshop/admin/orders" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Username" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            </div>
            <div class="form-group mr-2">
                <select name="status" class="form-control">
                    <option value="">All Statuses</option>
                    <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="Processing" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                    <option value="Shipped" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                    <option value="Delivered" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                    <option value="Cancelled" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="/onlineshop/admin/orders?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Order ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/orders?sort=username&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'username' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">User <?php if (isset($_GET['sort']) && $_GET['sort'] == 'username') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/orders?sort=total_amount&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'total_amount' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Total Amount <?php if (isset($_GET['sort']) && $_GET['sort'] == 'total_amount') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/orders?sort=status&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'status' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Status <?php if (isset($_GET['sort']) && $_GET['sort'] == 'status') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/orders?sort=created_at&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'created_at' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Order Date <?php if (isset($_GET['sort']) && $_GET['sort'] == 'created_at') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['username']; ?></td>
                <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                <td><?php echo $order['status']; ?></td>
                <td><?php echo $order['order_date']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOrderModal-<?php echo $order['id']; ?>">
                      Edit Status
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewOrderModal-<?php echo $order['id']; ?>">
                      View Details
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="/onlineshop/admin/orders?page=<?php echo $i; ?>&status=<?php echo htmlspecialchars($_GET['status'] ?? ''); ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>&sort=<?php echo htmlspecialchars($_GET['sort'] ?? ''); ?>&order=<?php echo htmlspecialchars($_GET['order'] ?? ''); ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php foreach ($orders as $order): ?>
    <?php require 'edit.php'; ?>
    <?php require 'view.php'; ?>
<?php endforeach; ?>
