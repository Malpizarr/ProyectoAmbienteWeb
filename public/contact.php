<?php include "../views/header.php"; ?>

<main>
    <section id="contact">
        <h2>Contacto</h2>

        <?php if (isset($_GET['status'])): ?>
            <script>
                <?php if ($_GET['status'] == 'success'): ?>
                alert('Mensaje enviado correctamente');
                <?php elseif ($_GET['status'] == 'error'): ?>
                alert('Hubo un error al enviar el mensaje');
                <?php elseif ($_GET['status'] == 'invalid_method'): ?>
                alert('Método de solicitud no válido');
                <?php endif; ?>
            </script>
        <?php endif; ?>

        <form action="../src/contact_form.php" method="post">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </section>
</main>

<?php include "../views/footer.php"; ?>