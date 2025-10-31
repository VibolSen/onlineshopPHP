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
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/editUserRole/<?php echo $user['id']; ?>' method='POST' class='form-container'>
        <h2>Edit User Role: <?php echo htmlspecialchars($user['username']); ?></h2>
        <?php if (isset($error)): ?>
            <p class='error-message'><?php echo $error; ?></p>
        <?php endif; ?>
        <div class='form-group'>
            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' value='<?php echo htmlspecialchars($user['username']); ?>' disabled>
        </div>
        <div class='form-group'>
            <label for='email'>Email:</label>
            <input type='email' id='email' name='email' value='<?php echo htmlspecialchars($user['email']); ?>' disabled>
        </div>
        <div class='form-group'>
            <label for='role'>Role:</label>
            <select id='role' name='role' required>
                <option value='user' <?php echo ($user['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                <option value='admin' <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>
        <button type='submit'>Update Role</button>
    </form>
`)">Edit Role</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>