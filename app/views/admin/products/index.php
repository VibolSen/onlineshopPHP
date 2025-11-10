<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Products</h5>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus-circle me-2"></i> Add New Product
        </button>
    </div>
    <div class="card-body">
        <form action="/onlineshop/admin/products" method="GET" class="row g-3 mb-4">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-filter"></i></span>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo (isset($_GET['category']) && $_GET['category'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th><a href="/onlineshop/admin/products?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/products?sort=name&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Name <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/products?sort=price&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Price <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/products?sort=stock&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'stock' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Stock <?php if (isset($_GET['sort']) && $_GET['sort'] == 'stock') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr class="text-center align-middle">
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td><span class="badge bg-secondary"><?php echo htmlspecialchars($product['category_name']); ?></span></td>
                            <td>
                                <?php if (!empty($product['image'])): ?>
                                    <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" width="60" class="img-thumbnail">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal-<?php echo $product['id']; ?>">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </button>
                                <a href="/onlineshop/admin/deleteProduct/<?php echo $product['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">
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
                        <a class="page-link" href="/onlineshop/admin/products?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>&category=<?php echo htmlspecialchars($_GET['category'] ?? ''); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<?php require_once 'create.php'; ?>

<?php foreach ($products as $product): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
