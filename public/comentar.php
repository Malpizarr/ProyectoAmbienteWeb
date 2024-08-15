<?php
include_once '../views/header.php';
include_once '../src/auth.php';
require_once '../src/Comentario.php';


if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$comentario = new Comentario($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["servicio_id"])  && isset($_POST["comentario"])) {
    $userId = $_SESSION['user_id'];
    $servicioId = $_POST["servicio_id"];
    $comentarioTexto = $_POST["comentario"];

    if ($comentario->addComentario($userId, $servicioId, $comentarioTexto)) {
        $mensaje = "Comentario guardado con éxito.";
    } else {
        $mensaje = "Error al guardar el comentario.";
        error_log("Error al guardar el comentario.");
    }
}

$sql = "SELECT id, nombre_servicio FROM servicios";
$result = $conn->query($sql);
?>

<main>
    <section id="comentar">
        <h2>Dejar un Comentario</h2>
        <?php if (isset($mensaje)): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <form action="comentar.php" method="post">
        <label for="servicio_id" class="label_coment">Selecciona un servicio:</label>
    <select name="servicio_id" id="servicio_id">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['nombre_servicio']) . '</option>';
            }
        } else {
            echo '<option value="">No hay servicios disponibles</option>';
        }
        ?>
    </select>
            <label for="comentario" class="label_coment">Comentario:</label>
            <textarea id="comentario" name="comentario" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </section>
    <section id="comentarios">
        <h2>Comentarios de usuarios</h2>
        <?php
$comentarios = $comentario->getAllComentarios();  

foreach ($comentarios as $comentario) {
    echo '<div class="comentario">';
    echo "<strong>Usuario: </strong>" . htmlspecialchars($comentario['username']) . "<br>";
    echo "<strong>Servicio: </strong>" . htmlspecialchars($comentario['servicio']) . "<br>";  
    echo "<strong>Comentario: </strong>" . htmlspecialchars($comentario['comentario']) . "<br>";
    echo "<strong>Fecha: </strong>" . htmlspecialchars($comentario['fecha']) . "<br>";
    echo '</div><br>';
}
        ?>
    </section>
</main>
<div class="hola"></div>

<?php include '../views/footer.php'; ?>
