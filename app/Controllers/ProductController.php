<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController {

    public function index() {
        $product = new Product();
        $products = $product->getAll();
        require __DIR__ . '/../Views/product/index.php';
    }

    public function create() {
        $category = new Category();
        $categories = $category->getAll();
        require __DIR__ . '/../Views/product/create.php';
    }

    public function store() {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $categoryId = $_POST['category_id'];

        $product = new Product();
        $product->add($name, $price, $categoryId);
        header('Location: /products');
    }
}