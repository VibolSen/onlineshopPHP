        <button onclick="openModal(`
            <form action='/onlineshop/admin/createCategory' method='POST' class='form-container'>
                <h2>Add New Category</h2>
                <?php if (isset($error)): ?>
                    <p class='error-message'><?php echo $error; ?></p>
                <?php endif; ?>
                <div class='form-group'>
                    <label for='name'>Category Name:</label>
                    <input type='text' id='name' name='name' required>
                </div>
                <button type='submit'>Add Category</button>
            </form>
        `)">Add New Category</button>