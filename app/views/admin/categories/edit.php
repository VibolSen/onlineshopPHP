<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal-<?php echo $category['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel-<?php echo $category['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel-<?php echo $category['id']; ?>">Edit Category: <?php echo htmlspecialchars($category['name']); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/onlineshop/admin/editCategory/<?php echo $category['id']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($category['name']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
</div>
