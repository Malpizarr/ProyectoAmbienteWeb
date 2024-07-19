<?php include '../views/header.php'; ?>

<main>
    <section id="login">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" action="../src/login.php" method="post">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
        </form>
    </section>
</main>

<?php include '../views/footer.php'; ?>
