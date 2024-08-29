<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            header("Location: ../public/index.php");
            exit;
        } else {
                echo "<script>
                alert('Contrasena incorrecta.');
                window.location.href = '../public/login.php';
              </script>";

        }
    } else {
        echo "Usuario no encontrado";
    }

    $conn->close();
}
?>
