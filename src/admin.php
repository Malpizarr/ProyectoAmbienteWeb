<?php
require_once 'database.php';

class Admin {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addUser($username, $email, $password, $role) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $userId);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function updateUser($userId, $username, $email, $role) {
        $sql = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("sssi", $username, $email, $role, $userId);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $userId);
            if ($stmt->execute()) {
                return $stmt->get_result()->fetch_assoc();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
