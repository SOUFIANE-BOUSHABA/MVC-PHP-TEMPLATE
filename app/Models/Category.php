<?php
namespace App\Models;

class Category {
    private $pdo;
    private $id;
    private $name;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getId() {
        return $this->id;
    }

    private function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        if (!empty($name) && is_string($name)) {
            $this->name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        } else {
            throw new \InvalidArgumentException("Invalid category name");
        }
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        $categories = $stmt->fetchAll();

        return array_map(function ($data) {
            $category = new self();
            $category->setId($data['id']);
            $category->setName($data['name']);
            return $category;
        }, $categories);
    }

    public function add($name) {
        $this->setName($name);
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute(['name' => $this->getName()]);
    }
}
