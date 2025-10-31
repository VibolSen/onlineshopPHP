<h1><?php echo $title; ?></h1>
<?php if (isset($error)): ?>
    <p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>
<form action="/onlineshop/admin/createCategory" method="POST">
    <div>
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <button type="submit">Add Category</button>
</form>