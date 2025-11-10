<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Manage Users</h5>
    </div>
    <div class="card-body">
        <form action="/onlineshop/admin/users" method="GET" class="row g-3 mb-4">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search by username or email" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
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
                        <th><a href="/onlineshop/admin/users?sort=id&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID <?php if (isset($_GET['sort']) && $_GET['sort'] == 'id') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/users?sort=username&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'username' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Username <?php if (isset($_GET['sort']) && $_GET['sort'] == 'username') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/users?sort=email&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'email' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Email <?php if (isset($_GET['sort']) && $_GET['sort'] == 'email') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th><a href="/onlineshop/admin/users?sort=role&order=<?php echo (isset($_GET['sort']) && $_GET['sort'] == 'role' && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Role <?php if (isset($_GET['sort']) && $_GET['sort'] == 'role') echo ($_GET['order'] == 'asc') ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>'; ?></a></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="text-center align-middle">
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><span class="badge bg-<?php echo ($user['role'] == 'admin') ? 'success' : 'secondary'; ?>"><?php echo htmlspecialchars($user['role']); ?></span></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal-<?php echo $user['id']; ?>">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </button>
                                <a href="/onlineshop/admin/deleteUser/<?php echo $user['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
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
                        <a class="page-link" href="/onlineshop/admin/users?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<?php foreach ($users as $user): ?>
    <?php require 'edit.php'; ?>
<?php endforeach; ?>
