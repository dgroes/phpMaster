<h2 class="title-category ">Editar categoria: <?= $cat->name; ?></h2>


<form action="<?= base_url ?>category/update" method="POST">
    <fieldset role="group">
        <input type="hidden" name="id" value="<?= $cat->id ?>" />
        <input type="text" name="name" placeholder="Nuevo nombre" value="<?= $cat->name; ?>" required />
        <input type="submit" value="Editar" />
    </fieldset>
</form>