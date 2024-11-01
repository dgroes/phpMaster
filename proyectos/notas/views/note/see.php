<section class="notes__note note__<?= $noteColor; ?>">
    <div class="note__titled"><?= $note->title; ?></div>
    <div class="note__contentd"><?= $note->content ?></div>
    <div class="note__footerd">
        <a href="<?= base_url ?>note/see&id=<?= $note->id ?>">ver</a>
        <a href="">eliminar</a>
        <a href="">editar</a>
    </div>
</section>