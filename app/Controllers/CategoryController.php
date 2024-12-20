<?php
namespace App\Controllers;

use App\Models\Category;

class CategoryController {

    private  $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $category = new Category($this->pdo);
        $categories = $category->getAll();
        require __DIR__ . '/../Views/category/index.php';
    }

    public function create() {
        require __DIR__ . '/../Views/category/create.php';
    }

    public function store() {
        $name = $_POST['name'];
        $category = new Category($this->pdo);
        $category->add($name);
        header('Location: /categories');
    }
}
