<!-- View Order Modal -->
<div class="modal fade" id="viewOrderModal-<?php echo $order['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalLabel-<?php echo $order['id']; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewOrderModalLabel-<?php echo $order['id']; ?>">Order Details #<?php echo htmlspecialchars($order['id']); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>User:</strong> <?php echo htmlspecialchars($order['username']); ?></p>
        <p><strong>Total Amount:</strong> $<?php echo htmlspecialchars(number_format($order['total_amount'], 2)); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>
        <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['created_at']); ?></p>
        <hr>
        <h5>Order Items</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order['details'] as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo htmlspecialchars(number_format($item['price'], 2)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
