<div role="group">
    <button><a class="button-action" href="<?= base_url ?>post/edit&id=<?= $post->id ?>">Editar</a></button>
    <button><a class="button-action" href="<?= base_url ?>post/delete&id=<?= $post->id ?>">Eliminar</a></button>
    <button
        <?php if ($post->status == 'Visible') : ?>
        disabled
        <?php endif; ?>>
        <a class="button-action" href="<?= base_url ?>post/status&id=<?= $post->id ?>&status=Visible">
            Visible
        </a>
    </button>

    <button
        <?php if ($post->status == 'Oculto') : ?>
        disabled
        <?php endif; ?>>
        <a class="button-action" href="<?= base_url ?>post/status&id=<?= $post->id ?>&status=Oculto">
            Ocultar
        </a>
    </button>

</div>

<!-- __ALERTA DE CAMBIO DE STATUS__ -->
<?php if (isset($_SESSION['post-status'])) : ?>
    <?php if ($_SESSION['post-status'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Se actualizó el estado del Post.
        </div>
    <?php elseif ($_SESSION['post-status'] == 'falied') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al cambiar el estado del Post. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['post-status']); ?>
<?php endif; ?>


<!-- __ALERTA DE EDICIÓN DEL POST__ -->
<?php if (isset($_SESSION['post-update'])) : ?>
    <?php if ($_SESSION['post-update'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Se actualizó el Post.
        </div>
    <?php elseif ($_SESSION['post-update'] == 'falied') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al editar el Post. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['post-update']); ?>
<?php endif; ?>

<h2 class="title-category"><?= $post->title ?></h2>

<?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?><!--  utilizar str_replace -->
<?php $statusClass = strtolower($post->status); ?>

<article class="post <?= $post->status == 'Oculto' ? $statusClass : $categoryClass ?>">


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


    <!-- Botón de Comentar en views/post/see_post.php -->
    <div role="group" class="post_interaction">
        <button data-tooltip="Like"><i class="fa-regular fa-thumbs-up"></i> 52</button>
        <button data-tooltip="Dislike"><i class="fa-regular fa-thumbs-down"></i> 4</button>
        <button data-target="comment-modal" onclick="toggleModal(event)" data-tooltip="Comentar"><i class="fa-regular fa-comments"></i> 7</button>
        <button data-tooltip="Compartir"> <i class="fa-regular fa-share-from-square"></i></button>
    </div>

    <!-- Modal para Comentar -->
    <dialog id="comment-modal">
        <article>
            <header>
                <button aria-label="Close" rel="prev" data-target="comment-modal" onclick="toggleModal(event)"></button>
                <h3>Deja tu comentario</h3>
            </header>
            <form action="" method="post">

                <p>
                    <!-- Aquí puedes agregar un formulario para que el usuario ingrese su comentario -->
                    <textarea placeholder="Escribe tu comentario aquí..." name="comentario"></textarea>
                </p>

                <footer class="modal_footer">
                    <input type="submit" value="Comentar" data-target="comment-modal" onclick="toggleModal(event)">
                    <button role="button" class="secondary" data-target="comment-modal" onclick="toggleModal(event)">Cancelar</button>
                    <!-- <button autofocus data-target="comment-modal" onclick="toggleModal(event)">Comentar</button> -->
                </footer>
            </form>
        </article>
    </dialog>



    <section class="container-comments">


        <?php if (isset($allComments) && $allComments->num_rows > 0): ?>
            <?php while ($comment = $allComments->fetch_object()): ?>
                <div class="comments">
                    <p class="creator_date"><?= $comment->creator ?> • <?= Utils::timeAgo($comment->created_at) ?></p>

                    <p class="comment"><?= $comment->comment ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay comentarios disponibles.</p>
        <?php endif; ?>
    </section>
</article>