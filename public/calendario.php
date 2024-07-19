<?php include '../views/header.php'; ?>

<main>
<form method="POST" action="guardar_evento.php">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea><br>

    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" required><br>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="datetime-local" name="fecha_fin" id="fecha_fin" required><br>

    <label for="lugar">Lugar:</label>
    <input type="text" name="lugar" id="lugar"><br>

    <button type="submit">Guardar Evento</button>
</form>
</main>

<?php include '../views/footer.php'; ?>