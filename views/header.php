<?php
include_once "../src/auth.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidados Paliativos</title>
    <link rel="stylesheet" href="/ProyectoAmbienteWeb/public/css/styles.css">
</head>
<body>
<header>
    <h1>Cuidados Paliativos</h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="about.php">Sobre Nosotros</a></li>
            <li><a href="services.php">Servicios</a></li>
            <li><a href="resources.php">Recursos</a></li>
            <li><a href="contact.php">Contacto</a></li>
            <li><a href="comentar.php">Comentar</a></li>
            <li><a href="donar.php">Donar</a></li>
            <?php if (isLoggedIn()): ?>
                <li><a href="citas.php">Citas</a></li>
                <?php if (getUserRole() == 'encargado'): ?>
                    <li><a href="admin_citas.php">Administrar Citas</a></li>
                    <li><a href="admin_donaciones.php">Administrar Donaciones</a></li>
                    <li><a href="admin.php">Administración</a></li>
                <?php endif; ?>
                <li><a href="../src/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="register.php">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
