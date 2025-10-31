<h1><?php echo $title; ?></h1>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Order Date</th>
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
                <td><?php echo $order['created_at']; ?></td>
                <td>
                    <a href="/onlineshop/admin/editOrderStatus/<?php echo $order['id']; ?>">Edit Status</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>