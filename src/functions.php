<?php
include "database.php";

function obtenerServicios() {
    global $conn;
    $sql = "SELECT * FROM servicios";
    $result = $conn->query($sql);
    return $result;
}
?>
