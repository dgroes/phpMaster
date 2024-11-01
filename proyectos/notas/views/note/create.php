<section class="create">

    <article>
        <!-- FORMULARIO DE CRACION DE UNA NUEVA NOTA -->
        <form action="<?= base_url ?>note/save" class="create__form" method="POST">
            <fieldset class="create__fielset">

                <legend class="form__legend">Nueva nota</legend>

                <input type="hidden" name="user_id" value="<?= $_SESSION['identity']->id ?>">

                <label for="title">Titulo</label>
                <input type="text" name="title" class="create__title">

                <label for="content">Contendio</label>
                <textarea name="content" class="create__content"></textarea>

                <label for="color">Color</label>

                <!-- Llamado del utils de colors -->
                <?php $colors = Utils::showColors(); ?>

                <select name="color_id" aria-label="Select your favorite cuisine..." required>
                    <option selected disabled value="">
                        Seleccionar color...
                    </option>
                    <?php while ($col = $colors->fetch_object()): ?>
                        <option value="<?= $col->id ?>">
                            <?= ucfirst($col->detail) ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <input type="submit" value="Crear Nota" class="create__submit">

            </fieldset>
        </form>

    </article>

</section>