<?php
include "header.php";
include "../src/functions.php";

$servicios = obtenerServicios();
?>
<main>
    <section id="services">
        <h2>Servicios Disponibles</h2>
        <ul>
            <?php while($row = $servicios->fetch_assoc()): ?>
                <li><?php echo $row["nombre_servicio"]; ?> - <?php echo $row["descripcion"]; ?></li>
            <?php endwhile; ?>
        </ul>
    </section>
</main>
<?php include "footer.php"; ?>
