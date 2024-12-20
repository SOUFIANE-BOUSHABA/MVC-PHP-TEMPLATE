<?php
namespace App\Controllers;

use App\Models\Category;

class CategoryController {

    public function index() {
        $category = new Category();
        $categories = $category->getAll();
        require __DIR__ . '/../Views/category/index.php';
    }

    public function create() {
        require __DIR__ . '/../Views/category/create.php';
    }

    public function store() {
        $name = $_POST['name'];
        $category = new Category();
        $category->add($name);
        header('Location: /categories');
    }
}
