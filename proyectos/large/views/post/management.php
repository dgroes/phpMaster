<details>
    <summary role="button" class="contrast">
        Crear Post
    </summary>
    <section class="post-create">
        <form action="<?= base_url . "post/save"; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titulo" aria-label="Text">
            <input type="text" name="sub_title" placeholder="Sub Titulo" aria-label="Text">
            <textarea name="content" placeholder="Write a professional short bio..." aria-label="Professional short bio"></textarea>

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

<h2 class="title-category">Mis Posts</h2>

<?php if ($myPosts && $myPosts->num_rows > 0) : ?>
    <?php while ($post = $myPosts->fetch_object()) : ?>
        <?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?><!--  utilizar str_replace -->

        <article class="post <?= $categoryClass ?>">
            <section class="post_head">
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
    <?php endwhile; ?>
<?php else : ?>
    <p>No tienes posts.</p>
<?php endif; ?>