<h2 class="title-category">Gestión de Posts</h2>

<div class="posts-container">
    <?php if ($allPosts && $allPosts->num_rows > 0) : ?>
        <?php while ($post = $allPosts->fetch_object()) : ?>
            <?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?>
            <?php $statusClass = strtolower($post->status); ?>


            <a href="<?= base_url ?>post/see&id=<?= $post->id ?>" class="post_link <?= $categoryClass; ?>">
                <article class="post <?= $post->status == 'Oculto' ? $statusClass : $categoryClass ?>">

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

                        <h3 class="title_post"><?= substr($post->title, 0, 30) ?>...</h3>
                        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?></p>

                    </section>

                    <p><?= nl2br(htmlspecialchars(substr($post->content, 0, 200))) ?>...</p>
                    <cite>— <?= $post->creator ?></cite>
                </article>
            </a>


        <?php endwhile; ?>
    <?php else : ?>
        <p>No tienes posts.</p>
    <?php endif; ?>

</div>