<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/Admin.php';

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: login.php');
    exit;
}

$admin = new Admin($conn);
$users = $admin->getAllUsers();
?>

<main>
    <section id="admin">
        <h2>Administración</h2>
        <h3>Lista de Usuarios</h3>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <form action="../src/delete_user.php" method="post" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                        <form action="edit_user.php" method="get" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Agregar Nuevo Usuario</h3>
        <form action="../src/add_user.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="paciente">Paciente</option>
                <option value="encargado">Encargado</option>
            </select>
            <button type="submit">Agregar Usuario</button>
        </form>
    </section>
</main>

<?php include '../views/footer.php'; ?>
