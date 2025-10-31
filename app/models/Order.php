<?php

require_once __DIR__ . '/../config/config.php';

class Order {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllOrders() {
        $sql = "SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.order_date DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($id) {
        $stmt = $this->conn->prepare("SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id WHERE o.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateOrderStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    public function countAllOrders() {
        $result = $this->conn->query("SELECT COUNT(*) as count FROM orders");
        return $result->fetch_assoc()['count'];
    }

    public function createOrder($userId, $totalAmount, $orderItems) {
        $this->conn->begin_transaction();
        try {
            // Insert into orders table
            $stmt = $this->conn->prepare("INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, 'pending')");
            $stmt->bind_param("id", $userId, $totalAmount);
            $stmt->execute();
            $orderId = $this->conn->insert_id;

            // Insert into order_items table
            $stmt_item = $this->conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            foreach ($orderItems as $item) {
                $stmt_item->bind_param("iiid", $orderId, $item['product_id'], $item['quantity'], $item['price']);
                $stmt_item->execute();
            }

            $this->conn->commit();
            return $orderId;
        } catch (mysqli_sql_exception $exception) {
            $this->conn->rollback();
            throw $exception;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>