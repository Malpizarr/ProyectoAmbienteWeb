<?php include '../views/header.php'; ?>

<main>
    <section id="register">
        <h2>Registro</h2>
        <form id="registerForm" action="../src/register.php" method="post">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="paciente">Paciente</option>
                <option value="encargado">Encargado</option>
            </select>
            <button type="submit">Registrarse</button>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </form>
    </section>
</main>

<?php include '../views/footer.php'; ?>
