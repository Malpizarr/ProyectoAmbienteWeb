<?php
include_once "../src/auth.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidados Paliativos</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<header>
    <h1>Cuidados Paliativos</h1>
    <nav>
        <ul>
            <li><a href="../public/index.php">Inicio</a></li>
            <li><a href="../public/about.php">Sobre Nosotros</a></li>
            <li><a href="../public/services.php">Servicios</a></li>
            <li><a href="../public/resources.php">Recursos</a></li>
            <li><a href="../public/contact.php">Contacto</a></li>
            <li><a href="../public/comentar.php">Comentar</a></li>
            <li><a href="../public/donar.php">Donar</a></li>
            <?php if (isLoggedIn()): ?>
                <li><a href="../public/citas.php">Citas</a></li>
                <?php if (getUserRole() == 'encargado'): ?>
                    <li><a href="../public/admin_citas.php">Administrar Citas</a></li>
                    <li><a href="../public/admin_donaciones.php">Administrar Donaciones</a></li>
                    <li><a href="../public/admin.php">Administración</a></li>
                <?php endif; ?>
                <li><a href="../src/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="../public/login.php">Iniciar Sesión</a></li>
                <li><a href="../public/register.php">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
