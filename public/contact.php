<?php include "../views/header.php"; ?>

<main>
    <section id="contact">
        <h2>Contacto</h2>
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
