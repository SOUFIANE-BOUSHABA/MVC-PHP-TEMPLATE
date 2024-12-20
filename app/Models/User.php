<?php
namespace App\Models;

class User {
    private $pdo;
    private $id;
    private $username;
    private $password;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getId() {
        return $this->id;
    }

    private function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        if (!empty($username) && is_string($username)) {
            $this->username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        } else {
            throw new \InvalidArgumentException("Invalid username");
        }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        if (!empty($password)) {
            $this->password = md5($password);
        } else {
            throw new \InvalidArgumentException("Invalid password");
        }
    }

    public function authenticate($username, $password) {
        $this->setUsername($username);
        $this->setPassword($password);

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $this->getUsername(), 'password' => $this->getPassword()]);
        $user = $stmt->fetch();

        if ($user) {
            $this->setId($user['id']);
            return true;
        }
        return false;
    }

    public function register($username, $password) {
        $this->setUsername($username);
        $this->setPassword($password);

        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $this->getUsername(), 'password' => $this->getPassword()]);
    }
}
