<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/Donacion.php';

if (!isLoggedIn() || getUserRole() != 'encargado') {
    header('Location: login.php');
    exit;
}

$donacion = new Donacion($conn);
$donaciones = $donacion->getAllDonaciones();
?>

<main>
    <section id="admin_donaciones">
        <h2>Gestionar Donaciones</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Razón</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($donaciones as $d): ?>
                <tr>
                    <td><?php echo $d['id']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['razon']; ?></td>
                    <td><?php echo $d['monto']; ?></td>
                    <td><?php echo $d['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../views/footer.php'; ?>
