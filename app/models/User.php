<?php

require_once __DIR__ . '/../config/config.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function findByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($username, $email, $password, $role = 'user') {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
        return $stmt->execute();
    }

    public function countAllUsers() {
        $result = $this->conn->query("SELECT COUNT(*) as count FROM users");
        return $result->fetch_assoc()['count'];
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateUserRole($id, $role) {
        $stmt = $this->conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $role, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getUsersFiltered($search, $limit, $offset, $sort, $order) {
        $sql = "SELECT * FROM users";
        $params = [];
        $types = '';

        if (!empty($search)) {
            $sql .= " WHERE username LIKE ? OR email LIKE ?";
            $searchTerm = "%" . $search . "%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $types .= 'ss';
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

    public function countUsersFiltered($search) {
        $sql = "SELECT COUNT(*) as count FROM users";
        $params = [];
        $types = '';

        if (!empty($search)) {
            $sql .= " WHERE username LIKE ? OR email LIKE ?";
            $searchTerm = "%" . $search . "%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $types .= 'ss';
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['count'];
    }

    public function verifyPassword($password, $hashed_password) {
        return password_verify($password, $hashed_password);
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>