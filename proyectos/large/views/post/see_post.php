<div role="group">
    <button><a class="button-action" href="<?= base_url ?>post/edit&id=<?= $post->id ?>">Editar</a></button>
    <button><a class="button-action" href="<?= base_url ?>post/delete&id=<?= $post->id ?>">Eliminar</a></button>
    <button aria-current="true">
        <a href="<?= base_url ?>post/status&id=<?= $post->id ?>&status=Visible">
            Visible
        </a>
    </button>
    <button>
        <a href="<?= base_url ?>post/status&id=<?= $post->id ?>&status=Ocultar">
            Ocultar
        </a>
    </button>
</div>

<?php if (isset($_SESSION['post-status'])) : ?>
    <?php if ($_SESSION['post-status'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Post creado correctamente.
        </div>
    <?php elseif ($_SESSION['post-status'] == 'falied') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al crear el Post. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['post-status']); ?>
<?php endif; ?>


<h2 class="title-category"><?= $post->title ?></h2>

<?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?><!--  utilizar str_replace -->
<?php $statusClass = strtolower($post->status); ?>
<a href="<?= base_url ?>post/see&id=<?= $post->id ?>" class="post_link <?= $categoryClass; ?>">
    <article 
    <?php if ($post->status == 'Ocultar') : ?> 
        class="post <?= $statusClass; ?>" 
        <?php elseif ($post->status == 'Visible') : ?> 
            class="post <?= $categoryClass ?>" 
    <?php endif; ?> >
   

    <section class="post_head">
        <?php if ($post->status == 'Ocultar') : ?>
            
            <div>
                <i class="fa-solid fa-eye-slash"></i> Post Oculto
            </div>

        <?php endif; ?>
        <p class="category_post"><?= $post->category_name ?></p>
        <p class="post_sub_title"><?= $post->sub_title ?></p>
        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?> by <?= $post->creator ?></p>
    </section>
    <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
    <?php if ($post->image != null) : ?>
        <img class="post_image" src="<?= base_url ?>uploads/images/<?= $post->image ?>" alt="">
    <?php endif; ?>


    </article>
</a>