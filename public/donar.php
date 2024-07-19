<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/Donacion.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$donacion = new Donacion($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["razon"]) && isset($_POST["monto"])) {
    $userId = $_SESSION['user_id'];
    $razon = $_POST["razon"];
    $monto = $_POST["monto"];

    if ($donacion->addDonacion($userId, $razon, $monto)) {
        $mensaje = "Donación realizada con éxito.";
    } else {
        $mensaje = "Error al realizar la donación.";
    }
}
?>

<main>
    <section id="donar">
        <h2>Hacer una Donación</h2>
        <?php if (isset($mensaje)): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <form action="donar.php" method="post">
            <label for="razon">Razón para la Donación:</label>
            <textarea id="razon" name="razon" required></textarea>
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" step="0.01" required>
            <button type="submit">Donar</button>
        </form>
    </section>
</main>

<?php include '../views/footer.php'; ?>
