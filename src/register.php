<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];

    if ($password != $confirm_password) {
        echo "Las contraseñas no coinciden";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro exitoso'); window.location.href='../public/login.php';</script>";
        exit;
    } else {
        $error_message = addslashes("Error: " . $conn->error);
        echo "<script>
                alert('$error_message');
                window.location.href = '../public/register.php';
              </script>";
    }

    $conn->close();
}
?>
