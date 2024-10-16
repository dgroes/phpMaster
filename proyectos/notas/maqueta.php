<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>

    <!-- Font Awesome, para la carga de iconos personalizados: -->
    <script src="https://kit.fontawesome.com/335ff06f37.js" crossorigin="anonymous"></script>

    <!-- Pico CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.yellow.min.css">

    <!-- Pico CSS Amarillo -->
    <!-- <link rel="stylesheet" href="css/pico.yellow.min.css" /> -->

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main class="container-fluid">
        <!-- NAV DE LA PÁGINA -->
        <nav class="nav">
            <ul>
                <li><a href="" class="nav__link"><i class="fa-solid fa-otter fa-2xl"></i> Notes</a></li>
            </ul>
            <ul>
                <li><a href="#" class="nav__link">Services</a></li>
                <li>
                    <details class="dropdown">
                        <summary>
                            Account
                        </summary>
                        <ul dir="rtl">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </nav>

        <!-- SECCIÓN DE BUSQUEDA DE NOTAS -->
        <section class="search">
            <article>
                <h2>Notas</h2>
                <input type="search" name="search" placeholder="Search" aria-label="Search" />

            </article>
        </section>

        <!-- SECCIÓN DE NOTAS -->
        <section class="notes">

            <article class="notes__note">
                <header class="note__title">Lavar Perras</header>
                <p class="note_content">
                    Laavar perras Poppy y Canela, con shampo y agua. Importante secar bien pelo y oidos.
                </p>
            </article>

            <article class="notes__note">
                <header class="note__tile">Ronda</header>
                <p class="note_content">
                    Caldera 1: 50° 4.2 <br>
                    Boiler 1: 57° 6.2 <br>
                    Boiler 2: 52° 8.2 <br>
                    Boiler 3: 45° 5.5 <br>
                    Boiler 4: 53° 8.8 <br>
                    - Leve filtración en Boiler n°1 <br>
                    - Resto de dependencias sin novedades y OK
                </p>

            </article>

            <article class="notes__note">
                <header class="note__tile">Deberes del Día</header>
                <p class="note_content">
                    Levantarse a las 08:00 <br>
                    Tender cama y ordenar cuarto <br>
                    Preparar desayuno <br>
                    Programar <br>
                    Almorzar <br>
                </p>

            </article>

            <article class="notes__note">
                <header class="note__title">Compra del Supermercado</header>
                <p class="note_content">
                    - Leche <br>
                    - Pan <br>
                    - Frutas (manzanas, plátanos) <br>
                    - Verduras (lechuga, zanahorias) <br>
                    - Arroz <br>
                    - Detergente
                </p>
            </article>

            <article class="notes__note">
                <header class="note__title">Ideas de Proyecto</header>
                <p class="note_content">
                    - Crear una app para organizar tareas diarias <br>
                    - Desarrollar un sistema de control de inventarios para pequeños negocios <br>
                    - App para seguimiento de hábitos y metas a largo plazo <br>
                    - Blog personal con secciones para compartir experiencias de aprendizaje <br>
                    - Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, qui! Accusantium ipsum cum consectetur nam debitis sapiente quas perferendis aliquam ea, eveniet repellendus quaerat explicabo velit reprehenderit architecto! Iste, nobis.
                </p>
            </article>

            <article class="notes__note">
                <header class="note__title">Películas para ver</header>
                <p class="note_content">
                    - Inception <br>
                    - The Matrix <br>
                    - The Grand Budapest Hotel <br>
                    - Interstellar <br>
                    - Parasite <br>
                    - Blade Runner 2049
                </p>
            </article>

            <article class="notes__note">
                <header class="note__title">Recordatorios del mes</header>
                <p class="note_content">
                    - Pago de servicios (luz, agua, internet) el 5 de cada mes <br>
                    - Revisión médica el día 12 <br>
                    - Cumpleaños de Carlos el día 20 <br>
                    - Renovar suscripción al gimnasio el día 25
                </p>
            </article>

            <article class="notes__note">
                <header class="note__title">Citas importantes</header>
                <p class="note_content">
                    - Lunes 10:00 am: Reunión con el equipo de desarrollo <br>
                    - Miércoles 03:00 pm: Cita con el dentista <br>
                    - Viernes 07:00 pm: Cena con amigos <br>
                    - Domingo 09:00 am: Taller de mindfulness
                </p>
            </article>


        </section>

    </main>
</body>

</html>