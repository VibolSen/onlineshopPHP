<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->create($username, $email, $password)) {
                // After register, redirect to login
                $this->redirect('login');
            } else {
                $this->view('register', ['error' => 'Registration failed.']);
            }
        } else {
            $this->view('register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->findByUsername($username);

            if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // ✅ Redirect based on role
                if ($user['role'] === 'admin') {
                    // Redirect to Admin Dashboard
                    $this->redirect('admin');
                } else {
                    // Redirect normal users to homepage
                    $this->redirect('');
                }
            } else {
                $this->view('login', ['error' => 'Invalid username or password.']);
            }
        } else {
            $this->view('login');
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('login');
    }
}
?>
