<?php
class Comentario
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function addComentario($userId, $servicioId, $comentario)
    {
        $sql = "INSERT INTO comentarios (user_id, servicio_id, comentario) VALUES (?, ?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("iis", $userId, $servicioId, $comentario);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function getAllComentarios()
    {
        $sql = "SELECT c.id, u.username, s.nombre_servicio AS servicio, c.comentario, c.fecha 
            FROM comentarios c 
            JOIN users u ON c.user_id = u.id 
            JOIN servicios s ON c.servicio_id = s.id";
        $result = $this->conn->query($sql);

        if ($result === false) {
            error_log("Error en la consulta SQL: " . $this->conn->error);
            return [];
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function deleteComentario($comentarioId)
    {
        $sql = "DELETE FROM comentarios WHERE id = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $comentarioId);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}

?>
