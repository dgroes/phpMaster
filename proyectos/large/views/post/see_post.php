<div role="group">
    <button><a href="<?= base_url ?>post/edit&id=<?= $post->id?>">Editar</a></button>
    <button><a href="<?= base_url ?>post/delete&id=<?= $post->id?>">Eliminar</a></button>
    <button aria-current="true">Visible</button>
    <button>Ocultar</button>
</div>

<h2 class="title-category"><?= $post->title ?></h2>

<?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?><!--  utilizar str_replace -->


<article class="post <?= $categoryClass ?>">
    <section class="post_head">
        <p class="category_post"><?= $post->category_name ?></p>
        <p class="post_sub_title"><?= $post->sub_title ?></p>
        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?> by <?= $post->creator ?></p>
    </section>
    <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
    <?php if ($post->image != null) : ?>
        <img class="post_image" src="<?= base_url ?>uploads/images/<?= $post->image ?>" alt="">
    <?php endif; ?>


</article>


<h3><?= $post->title ?></h3>