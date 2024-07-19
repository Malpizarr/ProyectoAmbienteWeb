<?php
class Donacion {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function addDonacion($userId, $razon, $monto) {
        $sql = "INSERT INTO donaciones (user_id, razon, monto) VALUES (?, ?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("isd", $userId, $razon, $monto);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function getAllDonaciones() {
        $sql = "SELECT d.id, u.username, d.razon, d.monto, d.fecha FROM donaciones d JOIN users u ON d.user_id = u.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
