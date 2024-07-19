<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/citas.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$cita = new Cita($conn);
$userId = $_SESSION['user_id'];

$verMisCitas = isset($_GET['mis_citas']);

if ($verMisCitas) {
    $citas = $cita->getCitasByUser($userId);
} else {
    $citas = $cita->getAllCitas();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $citaId = $_POST["cita_id"];
    if (isset($_POST["accion"]) && $_POST["accion"] == "reservar") {
        $cita->reservarCita($citaId, $userId);
    } elseif (isset($_POST["accion"]) && $_POST["accion"] == "desreservar") {
        $cita->desreservarCita($citaId);
    }
    header("Location: citas.php");
    exit;
}
?>

<main>
    <section id="citas">
        <h2><?php echo $verMisCitas ? "Mis Citas Reservadas" : "Reservar Citas"; ?></h2>
        <a href="citas.php?mis_citas=<?php echo $verMisCitas ? '0' : '1'; ?>">
            <?php echo $verMisCitas ? "Ver todas las citas" : "Ver mis citas reservadas"; ?>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>Detalles</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $c): ?>
                    <tr>
                        <td><?php echo $c['fecha']; ?></td>
                        <td><?php echo $c['detalles']; ?></td>
                        <td>
                            <?php if ($c['reservado_por'] == $userId): ?>
                                <form action="citas.php" method="post">
                                    <input type="hidden" name="cita_id" value="<?php echo $c['id']; ?>">
                                    <input type="hidden" name="accion" value="desreservar">
                                    <button type="submit">Desreservar</button>
                                </form>
                            <?php elseif (!$c['reservado_por']): ?>
                                <form action="citas.php" method="post">
                                    <input type="hidden" name="cita_id" value="<?php echo $c['id']; ?>">
                                    <input type="hidden" name="accion" value="reservar">
                                    <button type="submit">Reservar</button>
                                </form>
                            <?php else: ?>
                                Reservado por otro usuario
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../views/footer.php'; ?>