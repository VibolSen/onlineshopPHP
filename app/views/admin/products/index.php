<h1><?php echo $title; ?></h1>
<div class="row mb-3">
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
          Add New Product
        </button>
    </div>
    <div class="col-md-6">
        <form action="/onlineshop/admin/products" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            </div>
            <div class="form-group mr-2">
                <select name="category" class="form-control">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo (isset($_GET['category']) && $_GET['category'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
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
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td>$<?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><?php echo $product['category_name']; ?></td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProductModal-<?php echo $product['id']; ?>">
                      Edit
                    </button>
                    <a href="/onlineshop/admin/deleteProduct/<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="/onlineshop/admin/products?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>&category=<?php echo htmlspecialchars($_GET['category'] ?? ''); ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php require_once 'create.php'; ?>

<?php foreach ($products as $product): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
