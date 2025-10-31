<h1><?php echo $title; ?></h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form action="/onlineshop/admin/editCategory/<?php echo $category['id']; ?>" method="POST">
    <div>
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
    </div>
    <button type="submit">Update Category</button>
</form>