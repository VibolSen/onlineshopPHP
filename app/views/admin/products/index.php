<h1><?php echo $title; ?></h1>
<a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/createProduct' method='POST' enctype='multipart/form-data' class='form-container'>
        <h2>Add New Product</h2>
        <div class='form-group'>
            <label for='name'>Product Name:</label>
            <input type='text' id='name' name='name' required>
        </div>
        <div class='form-group'>
            <label for='description'>Description:</label>
            <textarea id='description' name='description'></textarea>
        </div>
        <div class='form-group'>
            <label for='price'>Price:</label>
            <input type='number' id='price' name='price' step='0.01' required>
        </div>
        <div class='form-group'>
            <label for='stock'>Stock:</label>
            <input type='number' id='stock' name='stock' required>
        </div>
        <div class='form-group'>
            <label for='category_id'>Category:</label>
            <select id='category_id' name='category_id' required>
                <?php foreach ($categories as $category): ?>
                    <option value='<?php echo $category['id']; ?>'><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='image'>Product Image:</label>
            <input type='file' id='image' name='image' accept='image/*'>
        </div>
        <button type='submit'>Add Product</button>
    </form>
`)">Add New Product</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td>$<?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><?php echo $product['category_name']; ?></td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td>
                    <a href="#" onclick="openModal(`
    <form action='/onlineshop/admin/editProduct/<?php echo $product['id']; ?>' method='POST' enctype='multipart/form-data' class='form-container'>
        <h2>Edit Product: <?php echo htmlspecialchars($product['name']); ?></h2>
        <?php if (isset($error)): ?>
            <p class='error-message'><?php echo $error; ?></p>
        <?php endif; ?>
        <div class='form-group'>
            <label for='name'>Product Name:</label>
            <input type='text' id='name' name='name' value='<?php echo htmlspecialchars($product['name']); ?>' required>
        </div>
        <div class='form-group'>
            <label for='description'>Description:</label>
            <textarea id='description' name='description'><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class='form-group'>
            <label for='price'>Price:</label>
            <input type='number' id='price' name='price' step='0.01' value='<?php echo htmlspecialchars($product['price']); ?>' required>
        </div>
        <div class='form-group'>
            <label for='stock'>Stock:</label>
            <input type='number' id='stock' name='stock' value='<?php echo htmlspecialchars($product['stock']); ?>' required>
        </div>
        <div class='form-group'>
            <label for='category_id'>Category:</label>
            <select id='category_id' name='category_id' required>
                <?php foreach ($categories as $category): ?>
                    <option value='<?php echo $category['id']; ?>' <?php echo ($category['id'] == $product['category_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='image'>Product Image:</label>
            <?php if (!empty($product['image'])): ?>
                <p>Current Image: <img src='/onlineshop/assets/images/<?php echo $product['image']; ?>' alt='<?php echo $product['name']; ?>' width='50'></p>
                <input type='hidden' name='current_image' value='<?php echo htmlspecialchars($product['image']); ?>'>
            <?php endif; ?>
            <input type='file' id='image' name='image' accept='image/*'>
        </div>
        <button type='submit'>Update Product</button>
    </form>
`)">Edit</a>
                    <a href="/onlineshop/admin/deleteProduct/<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>