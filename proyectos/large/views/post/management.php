<details>
    <summary role="button" class="contrast">
        Crear Post
    </summary>

    <section class="post-create">
        <form action="<?= base_url . "post/save"; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titulo" aria-label="Text" required>
            <input type="text" name="sub_title" placeholder="Sub Titulo" aria-label="Text">
            <textarea name="content" placeholder="Write a professional short bio..." aria-label="Professional short bio" required></textarea>

            <?php $categories = Utils::showAllCategories(); ?>
            <select name="category_id" aria-label="Select your favorite cuisine..." required>
                <option selected disabled value="">
                    Seleccionar categoría...
                </option>
                <?php while ($cat = $categories->fetch_object()) : ?>
                    <option value="<?= $cat->id ?>" <?= isset($post) && is_object($post) && $cat->id == $post->getCategoryId() ? 'selected' : ''; ?>>
                        <?= $cat->name ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <input type="file" name="image">
            <input type="submit" value="Publicar">
        </form>
    </section>
</details>

<!-- __ALERTA DE CREACIÓN DE UN NUEVO POST__ -->
<?php if (isset($_SESSION['register-post'])) : ?>
    <?php if ($_SESSION['register-post'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Post creado correctamente.
        </div>
    <?php elseif ($_SESSION['register-post'] == 'falied') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al crear el Post. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['register-post']); ?>
<?php endif; ?>


<!-- __ALERTA DE ELIMINACIÓN DE UN POST__ -->
<?php if (isset($_SESSION['post-delete'])) : ?>
    <?php if ($_SESSION['post-delete'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Post eliminado correctamente.
        </div>
    <?php elseif (isset($_SESSION['post-delete']) == 'falied') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al eliminar el Post. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['post-delete']); ?>
<?php endif; ?>

<h2 class="title-category">Mis Posts</h2>

<?php if ($myPosts && $myPosts->num_rows > 0) : ?>
    <?php while ($post = $myPosts->fetch_object()) : ?>
        <?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?><!--  utilizar str_replace -->
        <?php $statusClass = strtolower($post->status); ?>
        <a href="<?= base_url ?>post/see&id=<?= $post->id ?>" class="post_link <?= $categoryClass; ?>">
            <article 
            <?php if ($post->status == 'Oculto') : ?> 
                class="post <?= $statusClass; ?>">
            <?php elseif ($post->status == 'Visible') : ?> 
                    class="post <?= $categoryClass ?>">
            <?php endif; ?>

            <section class="post_head">
            <?php if ($post->status == 'Oculto') : ?>
                    <?php $categoryClass == 'Oculto'; ?>
                    <div>
                        <i class="fa-solid fa-eye-slash"></i> Post Oculto
                    </div>

            <?php endif; ?>
                <p class="category_post"><?= $post->category_name ?></p>
                <h3><?= $post->title ?></h3>
                <p class="post_sub_title"><?= $post->sub_title ?></p>
                <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?></p>
            </section>
            <p><?= nl2br(htmlspecialchars(substr($post->content, 0, 300))) ?>...</p>
            <?php if ($post->image != null) : ?>
                <img class="post_image" src="<?= base_url ?>uploads/images/<?= $post->image ?>" alt="">
            <?php endif; ?>


            </article>
        </a>
    <?php endwhile; ?>
<?php else : ?>
    <p>No tienes posts.</p>
<?php endif; ?>