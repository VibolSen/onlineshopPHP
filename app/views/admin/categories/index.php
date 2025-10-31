<h1><?php echo $title; ?></h1>
<a href="/onlineshop/admin/createCategory">Add New Category</a>
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
                    <a href="/onlineshop/admin/editCategory/<?php echo $category['id']; ?>">Edit</a>
                    <a href="/onlineshop/admin/deleteCategory/<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>