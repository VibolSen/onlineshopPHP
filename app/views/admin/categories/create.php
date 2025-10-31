<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/onlineshop/admin/createCategory" method="POST">
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>
    </div>
  </div>
</div>