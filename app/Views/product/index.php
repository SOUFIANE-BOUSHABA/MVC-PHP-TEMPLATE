<h1>Product List</h1>
<a href="/products/create">Create New Product</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getPrice() ?></td>
            <td><?= $product->getCategoryName() ?></td>
            <td>
                <a href="/products/edit/<?= $product->getId() ?>">Edit</a>
                <a href="/products/delete/<?= $product->getId() ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
