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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $detalles = $_POST["detalles"];

    if (isset($_POST["cita_id"]) && !empty($_POST["cita_id"])) {
        $citaId = $_POST["cita_id"];
        $cita->updateCita($citaId, $fecha, $detalles);
    } else {
        // Crear nueva cita
        $cita->addCita($fecha, $detalles);
    }

    header("Location: admin_citas.php");
    exit;
}
?>

<main>
    <section id="admin_citas">
        <h2>Gestionar Citas</h2>
        <h3>Agregar o Editar Cita</h3>
        <form action="admin_citas.php" method="post">
            <input type="hidden" id="cita_id" name="cita_id">
            <label for="fecha">Fecha y Hora:</label>
            <input type="datetime-local" id="fecha" name="fecha" required>
            <label for="detalles">Detalles:</label>
            <textarea id="detalles" name="detalles" required></textarea>
            <button type="submit">Guardar Cita</button>
        </form>
        <h3>Lista de Citas</h3>
        <table>
            <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Detalles</th>
                <th>Reservado Por</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($citas as $c): ?>
                <tr>
                    <td><?php echo $c['fecha']; ?></td>
                    <td><?php echo $c['detalles']; ?></td>
                    <td><?php echo $c['reservado_por'] ? $c['reservado_por'] : 'Disponible'; ?></td>
                    <td>
                        <button onclick="editarCita('<?php echo $c['id']; ?>', '<?php echo $c['fecha']; ?>', '<?php echo $c['detalles']; ?>')">Editar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<script>
    function editarCita(id, fecha, detalles) {
        document.getElementById('cita_id').value = id;
        document.getElementById('fecha').value = fecha.replace(' ', 'T');
        document.getElementById('detalles').value = detalles;
    }
</script>

<?php include '../views/footer.php'; ?>
