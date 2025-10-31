<h1><?php echo $title; ?></h1>
<div class="row mb-3">
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
          Add New Category
        </button>
    </div>
    <div class="col-md-6">
        <form action="/onlineshop/admin/categories" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="/onlineshop/admin/categories?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/categories?sort=name&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Name <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategoryModal-<?php echo $category['id']; ?>">
                      Edit
                    </button>
                    <a href="/onlineshop/admin/deleteCategory/<?php echo $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="/onlineshop/admin/categories?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php require_once 'create.php'; ?>

<?php foreach ($categories as $category): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
