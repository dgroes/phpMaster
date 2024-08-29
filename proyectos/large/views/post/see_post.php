<!-- __<DIV> DE BOTONES DE EDITAR, ELIMINAR, VISIBLE Y OCULTAR__ -->
<!-- _ESTE <DIV> INTERACTIVO SOLO SE MOSTRARÁ SI SE ESTÁ LOGEADO Y EL POST PERTENECE AL USUARIO REGISTRADO_ -->
<?php if (isset($_SESSION['identity']) && $_SESSION['identity']->id == $post->user_id || isset($_SESSION['admin'])): ?>
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
<?php endif; ?>


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


<!-- __VISUALIZACIÓN DEL POST__ -->
<h2 class="title-category"><?= $post->title ?></h2>

<?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?>
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
        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?> by
            <a href="<?= base_url ?>user/perfil&creator=<?= $post->creator ?>"><?= $post->creator ?></a>
        </p>

    </section>

    <p><?= nl2br(htmlspecialchars($post->content)) ?></p>

    <?php if ($post->image != null) : ?>
        <img class="post_image" src="<?= base_url ?>uploads/images/<?= $post->image ?>" alt="">
    <?php endif; ?>


    <!-- Botón de Comentar en views/post/see_post.php -->
    <div role="group" class="post_interaction">


        <?php if (isset($_SESSION['identity'])) : ?>
            <form action="<?= base_url ?>like/add" method="POST" class="form_like">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['identity']->id ?>">

                <button type="submit" data-tooltip="Like" class="button_likes">
                    <i class="fa-regular fa-thumbs-up"></i> <?= $likeCount ?>
                </button>
            </form>
        <?php else : ?>
            <button type="submit" data-tooltip="Logear para dar Like">
                <i class="fa-regular fa-thumbs-up"></i> <?= $likeCount ?>
            </button>
        <?php endif; ?>


        <?php if (isset($_SESSION['identity'])) : ?>
            <form action="<?= base_url ?>dislike/add" method="POST" class="form_like">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <input type="hidden" name="user_id_dislike" value="<?= $_SESSION['identity']->id ?>">

                <button type="submit" data-tooltip="Dislike" class="button_dislikes">
                    <i class="fa-regular fa-thumbs-down"></i> <?= $dislikeCount ?>
                </button>
            </form>
        <?php else : ?>
            <button type="submit" data-tooltip="Logear para dar Dislike">
                <i class="fa-regular fa-thumbs-down"></i> <?= $dislikeCount ?>
            </button>
        <?php endif; ?>


        <button data-target="comment-modal" onclick="toggleModal(event)" data-tooltip="Comentar">
            <i class="fa-regular fa-comments"></i>
            <?= $commentCount ?>
        </button>

        <button data-tooltip="Compartir"> <i class="fa-regular fa-share-from-square"></i></button>

    </div>

    <?php if (isset($_SESSION['identity'])) : ?>

        <form action="<?= base_url ?>comment/save" method="POST">

            <input type="hidden" name="post_id" value="<?= $post->id; ?>">
            <textarea placeholder="Escribe tu comentario aquí..." name="content"></textarea>
            <input type="submit" value="Comentar">

            <!-- <button autofocus data-target="comment-modal" onclick="toggleModal(event)">Comentar</button> -->
            </footer>
        </form>

    <?php else : ?>

        <div>
            Si deseas comentar, dar like o dislike a este post, es necesario iniciar sesión.
        </div>

    <?php endif; ?>

    <!-- Modal para Comentar -->
    <dialog id="comment-modal">

        <article>

            <header>
                <button aria-label="Close" rel="prev" data-target="comment-modal" onclick="toggleModal(event)"></button>
                <h3>Deja tu comentario</h3>
            </header>

            <form action="<?= base_url ?>comment/save" method="POST">

                <p>
                    <input type="hidden" name="post_id" value="<?= $post->id; ?>">
                    <textarea placeholder="Escribe tu comentario aquí..." name="content"></textarea>
                </p>

                <footer class="modal_footer">
                    <input type="submit" value="Comentar" data-target="comment-modal" onclick="toggleModal(event)">
                    <button role="button" class="secondary" data-target="comment-modal" onclick="toggleModal(event)">Cancelar</button>
                    <!-- <button autofocus data-target="comment-modal" onclick="toggleModal(event)">Comentar</button> -->
                </footer>

            </form>

        </article>

    </dialog>


    <!-- __ALERTA DE CRECIÓN DE COMENTARIOS__ -->
    <?php if (isset($_SESSION['register-comment'])) : ?>
        <?php if ($_SESSION['register-comment'] == 'complete') : ?>
            <div class="alert alert-success">
                <i class="fa-regular fa-square-check"></i> Comentario creado con extio!
            </div>
        <?php elseif ($_SESSION['register-comment'] == 'falied') : ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-xmark"></i> Error hacer el comentario, por favor intentalo nuevamente.
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['register-comment']); ?>
    <?php endif; ?>



    <!-- __SECCIÓN DE COMENTARIOS__ -->
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