<footer>

</footer>

<script>
// Espera a que el documento esté listo
document.addEventListener("DOMContentLoaded", function () {
    // Selecciona las imágenes en los artículos
    const imagenes = document.querySelectorAll("article img");

    // Itera a través de cada imagen
    imagenes.forEach((imagen, index) => {
        // Crea un objeto Vibrant para la imagen
        const vibrant = new Vibrant(imagen);

        // Extrae la paleta de colores
        vibrant.getPalette((err, palette) => {
            // Selecciona el artículo correspondiente
            const article = imagen.closest("article");

            // Aplica el color de fondo dominante al artículo
            article.style.backgroundColor = palette.Vibrant.getHex();

            // Puedes ajustar el color utilizado (por ejemplo, usando "Muted" en lugar de "Vibrant")
            // article.style.backgroundColor = palette.Muted.getHex();
        });
    });
});
</script>

</body>

</html>