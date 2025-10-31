<h1><?php echo $title; ?></h1>
<a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/createCategory' method='POST' class='form-container'>
        <h2>Add New Category</h2>
        <div class='form-group'>
            <label for='name'>Category Name:</label>
            <input type='text' id='name' name='name' required>
        </div>
        <button type='submit'>Add Category</button>
    </form>
`)">Add New Category</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/editCategory/<?php echo $category['id']; ?>' method='POST' class='form-container'>
        <h2>Edit Category: <?php echo htmlspecialchars($category['name']); ?></h2>
        <?php if (isset($error)): ?>
            <p class='error-message'><?php echo $error; ?></p>
        <?php endif; ?>
        <div class='form-group'>
            <label for='name'>Category Name:</label>
            <input type='text' id='name' name='name' value='<?php echo htmlspecialchars($category['name']); ?>' required>
        </div>
        <button type='submit'>Update Category</button>
    </form>
`)">Edit</a>
                    <a href="/onlineshop/admin/deleteCategory/<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>