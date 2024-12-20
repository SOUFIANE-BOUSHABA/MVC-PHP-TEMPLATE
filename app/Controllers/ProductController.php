<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $product = new Product($this->pdo);
        $products = $product->getAll();
        require __DIR__ . '/../Views/product/index.php';
    }

    public function create() {
        $category = new Category($this->pdo);
        $categories = $category->getAll();
        require __DIR__ . '/../Views/product/create.php';
    }

    public function store() {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $categoryId = $_POST['category_id'];

        $product = new Product($this->pdo);
        $product->add($name, $price, $categoryId);
        header('Location: /products');
    }
}