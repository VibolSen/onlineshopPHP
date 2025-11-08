<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Order.php';

class OrderController extends Controller {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    public function confirmation($orderId) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /onlineshop/login');
            exit();
        }

        $order = $this->orderModel->getOrderById($orderId);

        if (!$order || $order['user_id'] !== $_SESSION['user_id']) {
            // Handle order not found or unauthorized access
            echo "404 Order Not Found or Unauthorized Access";
            exit();
        }

        // You might want to fetch order items here as well if needed for display
        // For now, just displaying basic order info

        $this->view('order/confirmation', [
            'order' => $order,
            'title' => 'Order Confirmation'
        ]);
    }
}
