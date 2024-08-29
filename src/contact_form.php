<?php
include "database.php";

$response = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $response = 'success';
    } else {
        $response = 'error';
    }

    $conn->close();
} else {
    $response = 'invalid_method';
}

header("Location: ../public/contact.php?status=" . $response);
exit;
?>
