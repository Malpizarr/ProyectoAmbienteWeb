<?php
include "auth.php";
require "Admin.php";

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: ../public/login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $admin = new Admin($conn);
    if ($admin->addUser($username, $email, $password, $role)) {
        header('Location: ../public/admin.php');
        exit;
    } else {
        echo "Error al agregar usuario.";
    }
}
?>
