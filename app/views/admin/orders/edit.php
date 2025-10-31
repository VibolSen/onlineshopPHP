<!-- Edit Order Modal -->
<div class="modal fade" id="editOrderModal-<?php echo $order['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel-<?php echo $order['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editOrderModalLabel-<?php echo $order['id']; ?>">Edit Order Status for Order #<?php echo htmlspecialchars($order['id']); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/onlineshop/admin/editOrderStatus/<?php echo $order['id']; ?>" method="POST">
            <div class="form-group">
                <label for="order_id">Order ID:</label>
                <input type="text" id="order_id" name="order_id" class="form-control" value="<?php echo htmlspecialchars($order['id']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="username">User:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($order['username']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <input type="text" id="total_amount" name="total_amount" class="form-control" value="$<?php echo htmlspecialchars(number_format($order['total_amount'], 2)); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Pending" <?php echo ($order['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="Processing" <?php echo ($order['status'] === 'Processing') ? 'selected' : ''; ?>>Processing</option>
                    <option value="Shipped" <?php echo ($order['status'] === 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                    <option value="Delivered" <?php echo ($order['status'] === 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                    <option value="Cancelled" <?php echo ($order['status'] === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
      </div>
    </div>
  </div>
</div>
