<h2 class="title-category"> Edición de perfil: <?= $_SESSION['identity']->username ?></h2>

<form action="<?= base_url ?>user/update" method="post">
    <label for="bio">Presentación</label>
    <input type="hidden" name="id" value="<?= $_SESSION['identity']->id?>">
    <textarea
        name="bio"
        placeholder="Write a professional short bio..."
        aria-label="Professional short bio">
</textarea>
<input type="submit" value="Enviar">
</form>
