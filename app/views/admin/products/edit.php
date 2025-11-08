<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal-<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel-<?php echo $product['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel-<?php echo $product['id']; ?>">Edit Product: <?php echo htmlspecialchars($product['name']); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/onlineshop/admin/editProduct/<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $product['category_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($category['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <?php if (!empty($product['image'])): ?>
                    <p>Current Image: <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></p>
                    <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($product['image']); ?>">
                <?php endif; ?>
                <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
      </div>
    </div>
  </div>
</div>
