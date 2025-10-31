<h1><?php echo $title; ?></h1>
<?php if (isset($error)): ?>
    <p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>
<form action="/onlineshop/admin/createProduct" method="POST" enctype="multipart/form-data" class="form-container">
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
    </div>
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit">Add Product</button>
</form>