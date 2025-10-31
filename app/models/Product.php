<?php

require_once __DIR__ . '/../config/config.php';

class Product {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllProducts() {
        $sql = "SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByCategory($categoryId) {
        $stmt = $this->conn->prepare("SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.category_id = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($productId) {
        $stmt = $this->conn->prepare("SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getProductsFiltered($search, $category, $limit, $offset, $sort, $order) {
        $sql = "SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id";
        $params = [];
        $types = '';

        if (!empty($search)) {
            $sql .= " WHERE p.name LIKE ?";
            $params[] = "%" . $search . "%";
            $types .= 's';
        }

        if (!empty($category)) {
            $sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
            $sql .= " p.category_id = ?";
            $params[] = $category;
            $types .= 'i';
        }

        $sql .= " ORDER BY $sort $order LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        $types .= 'ii';

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countProductsFiltered($search, $category) {
        $sql = "SELECT COUNT(*) as count FROM products p";
        $params = [];
        $types = '';

        if (!empty($search)) {
            $sql .= " WHERE p.name LIKE ?";
            $params[] = "%" . $search . "%";
            $types .= 's';
        }

        if (!empty($category)) {
            $sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
            $sql .= " p.category_id = ?";
            $params[] = $category;
            $types .= 'i';
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['count'];
    }

    public function createProduct($name, $description, $price, $stock, $categoryId, $image = null) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, description, price, stock, category_id, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiis", $name, $description, $price, $stock, $categoryId, $image);
        return $stmt->execute();
    }

    public function updateProduct($id, $name, $description, $price, $stock, $categoryId, $image = null) {
        if ($image) {
            $stmt = $this->conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssdiisi", $name, $description, $price, $stock, $categoryId, $image, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?");
            $stmt->bind_param("ssdiis", $name, $description, $price, $stock, $categoryId, $id);
        }
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public function updateProductStock($productId, $quantityChange) {
        $stmt = $this->conn->prepare("UPDATE products SET stock = stock + ? WHERE id = ?");
        if (!$stmt) {
            error_log("Product stock update prepare failed: " . $this->conn->error);
            return false;
        }
        $stmt->bind_param("ii", $quantityChange, $productId);
        if (!$stmt->execute()) {
            error_log("Product stock update execute failed: " . $stmt->error);
            return false;
        }
        return true;
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>