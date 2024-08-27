

<h2 class="title-category">Busqueda: <?= $search ?></h2>

<div class="content">
    <div class="posts">
        <?php if ($allPosts && $allPosts->num_rows > 0) : ?>
            <?php while ($post = $allPosts->fetch_object()) : ?>
                <?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?>
                <?php $statusClass = strtolower($post->status); ?>
                <a href="<?= base_url ?>post/see&id=<?= $post->id ?>" class="post_link <?= $categoryClass; ?>">
                    <article
                        <?php if ($post->status == 'Oculto') : ?>
                        class="post <?= $statusClass; ?>">
                    <?php elseif ($post->status == 'Visible') : ?>
                        class="post <?= $categoryClass ?>">
                    <?php endif; ?>

                    <section class="post_head">
                        <div class="class_status">
                            <div>
                                <p class="category_post"><?= $post->category_name ?></p>
                            </div>
                            <div>
                                <?php if ($post->status == 'Oculto') : ?>
                                    <?php $categoryClass == 'Oculto'; ?>
                                    <div>
                                        <i class="fa-solid fa-eye-slash"></i> Post Oculto
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>


                        <h3><?= $post->title ?></h3>
                        <p class="post_sub_title"><?= $post->sub_title ?></p>
                        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?> by </p>
                        <p><a href="<?= base_url ?>user/perfilPublic&id=<?= $post->user_id ?>" class="perfil_creator"><?= $post->creator ?></a></p>
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
    </div>