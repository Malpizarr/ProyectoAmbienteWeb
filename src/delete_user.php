<?php
include "auth.php";
require_once 'database.php';
require_once 'Admin.php';

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
        echo "<script>
                alert('Error al eliminar usuario.');
                window.location.href = '../public/admin.php';
              </script>";
        error_log("Error al intentar eliminar el usuario con ID: $userId");
    }
}
?>
