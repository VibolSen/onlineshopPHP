<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/User.php';

class UserController extends Controller {
    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('login');
        }

        $user = $this->userModel->findById($_SESSION['user_id']);

        if ($user) {
            $this->view('user/profile', ['user' => $user]);
        } else {
            // Handle case where user is not found, maybe log them out
            $this->redirect('logout');
        }
    }
}
?>