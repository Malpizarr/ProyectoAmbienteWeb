document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#contactForm");

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../src/contact_form.php", {
            method: "post",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Hubo un error al enviar el mensaje.");
            });
    });
});