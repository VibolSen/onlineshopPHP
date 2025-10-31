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
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/editOrderStatus/<?php echo $order['id']; ?>' method='POST' class='form-container'>
        <h2>Edit Order Status for Order #<?php echo htmlspecialchars($order['id']); ?></h2>
        <?php if (isset($error)): ?>
            <p class='error-message'><?php echo $error; ?></p>
        <?php endif; ?>
        <div class='form-group'>
            <label for='order_id'>Order ID:</label>
            <input type='text' id='order_id' name='order_id' value='<?php echo htmlspecialchars($order['id']); ?>' disabled>
        </div>
        <div class='form-group'>
            <label for='username'>User:</label>
            <input type='text' id='username' name='username' value='<?php echo htmlspecialchars($order['username']); ?>' disabled>
        </div>
        <div class='form-group'>
            <label for='total_amount'>Total Amount:</label>
            <input type='text' id='total_amount' name='total_amount' value='$<?php echo htmlspecialchars(number_format($order['total_amount'], 2)); ?>' disabled>
        </div>
        <div class='form-group'>
            <label for='status'>Status:</label>
            <select id='status' name='status' required>
                <option value='Pending' <?php echo ($order['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value='Processing' <?php echo ($order['status'] === 'Processing') ? 'selected' : ''; ?>>Processing</option>
                <option value='Shipped' <?php echo ($order['status'] === 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value='Delivered' <?php echo ($order['status'] === 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                <option value='Cancelled' <?php echo ($order['status'] === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
            </select>
        </div>
        <button type='submit'>Update Status</button>
    </form>
`)">Edit Status</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>