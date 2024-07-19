<?php
include "auth.php";
require "Admin.php";

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: ../public/login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["user_id"];
    $admin = new Admin($conn);

    if ($admin->deleteUser($userId)) {
        header('Location: ../public/admin.php');
        exit;
    } else {
        echo "Error al eliminar usuario.";
    }
}
?>
