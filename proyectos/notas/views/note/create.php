<section class="create">

    <article>
        <!-- FORMULARIO DE CRACION DE UNA NUEVA NOTA -->
        <form action="" class="create__form">
            <fieldset class="create__fielset">

                <legend class="form__legend">Nueva nota</legend>

                <input type="hidden" name="user_id" value="<?= $_SESSION['identity']->id ?>">

                <label for="title">Titulo</label>
                <input type="text" name="title " class="create__title">

                <label for="content">Contendio</label>
                <textarea name="content" id="" class="create__content"></textarea>

                <label for="color">Color</label>
                <select name="category_id" aria-label="Select your favorite cuisine..." required>
                    <option selected disabled value="">
                        Seleccionar color...
                    </option>
                    <option value="">pene</option>
                    <option value="">penesito</option>
                </select>

                <input type="submit" value="Crear Nota" class="create__submit">

            </fieldset>
        </form>

    </article>

</section>