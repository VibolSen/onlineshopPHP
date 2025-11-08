<div class="row mb-3">
    <div class="col-md-12">
        <form action="/onlineshop/admin/users" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search by username or email" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="/onlineshop/admin/users?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/users?sort=username&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'username' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Username <?php if (isset($_GET['sort']) && $_GET['sort'] == 'username') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/users?sort=email&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'email' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Email <?php if (isset($_GET['sort']) && $_GET['sort'] == 'email') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th><a href="/onlineshop/admin/users?sort=role&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'role' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Role <?php if (isset($_GET['sort']) && $_GET['sort'] == 'role') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUserModal-<?php echo $user['id']; ?>">
                      Edit
                    </button>
                    <a href="/onlineshop/admin/deleteUser/<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="/onlineshop/admin/users?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php foreach ($users as $user): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
