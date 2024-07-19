<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/Admin.php';

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: login.php');
    exit;
}

$admin = new Admin($conn);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["user_id"])) {
    $userId = $_GET["user_id"];
    $user = $admin->getUserById($userId);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"])) {
    $userId = $_POST["user_id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    if ($admin->updateUser($userId, $username, $email, $role)) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Error al actualizar usuario.";
    }
}
?>

<main>
    <section id="edit_user">
        <h2>Editar Usuario</h2>
        <form action="edit_user.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="paciente" <?php echo $user['role'] == 'paciente' ? 'selected' : ''; ?>>Paciente</option>
                <option value="encargado" <?php echo $user['role'] == 'encargado' ? 'selected' : ''; ?>>Encargado</option>
            </select>
            <button type="submit">Actualizar Usuario</button>
        </form>
    </section>
</main>

<?php include '../views/footer.php'; ?>
