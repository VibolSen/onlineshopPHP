<h1><?php echo $title; ?></h1>
<?php if (isset($error)): ?>
    <p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>
<form action="/onlineshop/admin/editProduct/<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
    <div>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
    </div>
    <div>
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $product['category_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="image">Product Image:</label>
        <?php if (!empty($product['image'])): ?>
            <p>Current Image: <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></p>
            <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($product['image']); ?>">
        <?php endif; ?>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit">Update Product</button>
</form>