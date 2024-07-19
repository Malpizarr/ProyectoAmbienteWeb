<?php
class Cita {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getAllCitas() {
        $sql = "SELECT * FROM citas";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCitasByUser($userId) {
        $sql = "SELECT * FROM citas WHERE reservado_por = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

public function desreservarCita($citaId) {
    $sql = "UPDATE citas SET reservado_por = NULL WHERE id = ?";

    if ($stmt = $this->conn->prepare($sql)) {
        $stmt->bind_param("i", $citaId);
        return $stmt->execute();
    } else {
        return false;
    }
}

    public function addCita($fecha, $detalles) {
        $sql = "INSERT INTO citas (fecha, detalles) VALUES (?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ss", $fecha, $detalles);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function reservarCita($citaId, $userId) {
        $sql = "UPDATE citas SET reservado_por = ? WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ii", $userId, $citaId);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function getCitaById($citaId) {
        $sql = "SELECT * FROM citas WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $citaId);
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
