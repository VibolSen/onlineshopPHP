<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Categories</h5>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus-circle me-2"></i> Add New Category
        </button>
    </div>
    <div class="card-body">
        <form action="/onlineshop/admin/categories" method="GET" class="row g-3 mb-4">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search me-2"></i> Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th><a href="/onlineshop/admin/categories?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/categories?sort=name&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Name <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr class="text-center align-middle">
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo htmlspecialchars($category['name']); ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal-<?php echo $category['id']; ?>">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </button>
                                <a href="/onlineshop/admin/deleteCategory/<?php echo $category['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </a>
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
                        <a class="page-link" href="/onlineshop/admin/categories?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<?php require_once 'create.php'; ?>

<?php foreach ($categories as $category): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
