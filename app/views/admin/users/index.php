<h1><?php echo $title; ?></h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
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
                    <a href="/onlineshop/admin/editUserRole/<?php echo $user['id']; ?>">Edit Role</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>