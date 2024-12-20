<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {


    public function login() {
        require __DIR__ . '/../Views/auth/login.php';
    }

    public function handleLogin() {
        global $pdo;
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        if ($user->authenticate($username, $password)) {
            session_start();
            $_SESSION['user'] = $user->getUsername();
            header('Location: /categories');
        } else {
            echo "Invalid credentials.";
        }
    }

    public function register() {
        require __DIR__ . '/../Views/auth/register.php';
    }

    public function handleRegister() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
            return;
        }

        try {
            $user = new User();
            $user->register($username, $password);
            echo "Registration successful. You can now <a href='/'>login</a>.";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
