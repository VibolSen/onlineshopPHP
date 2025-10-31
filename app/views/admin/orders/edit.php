<h1><?php echo $title; ?></h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form action="/onlineshop/admin/editOrderStatus/<?php echo $order['id']; ?>" method="POST">
    <div>
        <label for="order_id">Order ID:</label>
        <input type="text" id="order_id" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>" disabled>
    </div>
    <div>
        <label for="username">User:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($order['username']); ?>" disabled>
    </div>
    <div>
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="$<?php echo htmlspecialchars(number_format($order['total_amount'], 2)); ?>" disabled>
    </div>
    <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending" <?php echo ($order['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="Processing" <?php echo ($order['status'] === 'Processing') ? 'selected' : ''; ?>>Processing</option>
            <option value="Shipped" <?php echo ($order['status'] === 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
            <option value="Delivered" <?php echo ($order['status'] === 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
            <option value="Cancelled" <?php echo ($order['status'] === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
        </select>
    </div>
    <button type="submit">Update Status</button>
</form>