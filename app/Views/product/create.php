<h1>Create Product</h1>
<form method="POST" action="/products">
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" placeholder="Enter Product Name" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" name="price" id="price" placeholder="Enter Price" required>

    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Create Product</button>
</form>
