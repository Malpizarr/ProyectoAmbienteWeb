<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/citas.php';

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: login.php');
    exit;
}

$cita = new Cita($conn);
$citas = $cita->getAllCitas();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fecha"]) && isset($_POST["detalles"])) {
    $fecha = $_POST["fecha"];
    $detalles = $_POST["detalles"];
    $cita->addCita($fecha, $detalles);
    header("Location: admin_citas.php");
    exit;
}
?>

<main>
    <section id="admin_citas">
        <h2>Gestionar Citas</h2>
        <h3>Agregar Nueva Cita</h3>
        <form action="admin_citas.php" method="post">
            <label for="fecha">Fecha y Hora:</label>
            <input type="datetime-local" id="fecha" name="fecha" required>
            <label for="detalles">Detalles:</label>
            <textarea id="detalles" name="detalles" required></textarea>
            <button type="submit">Agregar Cita</button>
        </form>
        <h3>Lista de Citas</h3>
        <table>
            <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Detalles</th>
                <th>Reservado Por</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($citas as $c): ?>
                <tr>
                    <td><?php echo $c['fecha']; ?></td>
                    <td><?php echo $c['detalles']; ?></td>
                    <td><?php echo $c['reservado_por'] ? $c['reservado_por'] : 'Disponible'; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../views/footer.php'; ?>
