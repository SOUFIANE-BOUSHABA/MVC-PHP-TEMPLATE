<h1>Categories</h1>
<a href="/categories/create">Create Category</a>
<ul>
    <?php foreach ($categories as $category): ?>
        <li><?= $category->getName() ?></li>
    <?php endforeach; ?>
</ul>
