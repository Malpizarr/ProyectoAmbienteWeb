<?php
include "database.php";

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'Mensaje enviado correctamente';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $conn->error;
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de solicitud no válido.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
