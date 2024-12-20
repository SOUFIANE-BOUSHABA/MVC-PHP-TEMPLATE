<?php
namespace App\Models;

class Product {
    private $pdo;
    private $id;
    private $name;
    private $price;
    private $categoryId;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryName() {
        $stmt = $this->pdo->prepare("SELECT name FROM categories WHERE id = :id");
        $stmt->execute(['id' => $this->getCategoryId()]);
        $category = $stmt->fetch();
        return $category ? $category['name'] : null;
    }




    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll();

        return array_map(function ($data) {
            $product = new self();
            $product->setId($data['id']);
            $product->setName($data['name']);
            $product->setPrice($data['price']);
            $product->setCategoryId($data['category_id']);
            return $product;
        }, $products);
    }




    public function add($name, $price, $categoryId) {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCategoryId($categoryId);

        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, category_id) VALUES (:name, :price, :category_id)");
        $stmt->execute([
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'category_id' => $this->getCategoryId(),
        ]);
    }
}
