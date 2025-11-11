<?php

require_once __DIR__ . '/../config/config.php';

/**
 * User Model
 * Handles all database operations related to users, including creation, retrieval,
 * updating, and deletion of user records.
 */
class User {
    private $conn;

    /**
     * Constructor for the User model.
     * Establishes a database connection.
     */
    public function __construct() {
        $this->conn = connectDB();
    }

    /**
     * Finds a user by their username.
     *
     * @param string $username The username to search for.
     * @return array|null An associative array of user data if found, otherwise null.
     */
    public function findByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * Finds a user by their ID.
     *
     * @param int $id The user ID to search for.
     * @return array|null An associative array of user data if found, otherwise null.
     */
    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * Creates a new user record in the database.
     *
     * @param string $username The username for the new user.
     * @param string $email The email address for the new user.
     * @param string $password The plain text password for the new user.
     * @param string $role The role of the new user (default: 'user').
     * @return bool True on success, false on failure.
     */
    public function create($username, $email, $password, $role = 'user') {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
        return $stmt->execute();
    }

    /**
     * Counts the total number of users in the database.
     *
     * @return int The total number of users.
     */
    public function countAllUsers() {
        $result = $this->conn->query("SELECT COUNT(*) as count FROM users");
        return $result->fetch_assoc()['count'];
    }

    /**
     * Retrieves all user records from the database.
     *
     * @return array An array of associative arrays, each representing a user.
     */
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Updates the role of a specific user.
     *
     * @param int $id The ID of the user to update.
     * @param string $role The new role for the user.
     * @return bool True on success, false on failure.
     */
    public function updateUserRole($id, $role) {
        $stmt = $this->conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $role, $id);
        return $stmt->execute();
    }

    /**
     * Deletes a user record from the database.
     *
     * @param int $id The ID of the user to delete.
     * @return bool True on success, false on failure.
     */
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    /**
     * Retrieves a filtered and paginated list of users.
     *
     * @param string $search Search term for username or email.
     * @param int $limit The maximum number of users to return.
     * @param int $offset The number of users to skip.
     * @param string $sort The column to sort by.
     * @param string $order The sort order (ASC or DESC).
     * @return array An array of associative arrays, each representing a user.
     */
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

    /**
     * Counts the number of users matching a given search term.
     *
     * @param string $search Search term for username or email.
     * @return int The number of filtered users.
     */
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

    /**
     * Verifies a plain text password against a hashed password.
     *
     * @param string $password The plain text password.
     * @param string $hashed_password The hashed password from the database.
     * @return bool True if the password matches, false otherwise.
     */
    public function verifyPassword($password, $hashed_password) {
        return password_verify($password, $hashed_password);
    }

    /**
     * Destructor for the User model.
     * Closes the database connection when the object is destroyed.
     */
    public function __destruct() {
        $this->conn->close();
    }
}

?>