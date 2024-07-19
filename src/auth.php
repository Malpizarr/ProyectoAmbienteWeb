<?php
include "database.php";

function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['user_role'] ?? null;
}

function logout() {
    session_destroy();
    header("Location: ../public/login.php");
    exit;
}
?>
