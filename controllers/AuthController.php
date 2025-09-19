<?php
require_once __DIR__ . '/../models/User.php';
session_start();

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($this->userModel->register($name, $email, $password)) {
                header('Location: index.php?page=login');
            } else {
                echo "Erro ao registrar usuário!";
            }
        }
        include __DIR__ . '/../views/register.php';
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?page=dashboard');
            } else {
                echo "Email ou senha incorretos!";
            }
        }
        include __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
    }
}
