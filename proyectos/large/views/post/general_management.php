<h2 class="title-category">Gestión de Posts</h2>

<div class="posts-container">
    <?php if ($allPosts && $allPosts->num_rows > 0) : ?>
        <?php while ($post = $allPosts->fetch_object()) : ?>
            <?php $categoryClass = strtolower(str_replace(' ', '', $post->category_name)); ?>

            <a href="<?= base_url ?>post/see&id=<?= $post->id ?>" class="post_link <?= $categoryClass ?>">
                <article class="post <?= $categoryClass ?>">
                    <section class="post_head">
                        <p class="category_post"><?= $post->category_name ?></p>
                        <h3 class="title_post"><?= substr($post->title, 0, 30) ?>...</h3>
                        <p class="post_detail">Publicado el: <?= date('Y-m-d H:i', strtotime($post->created_at)) ?></p>
                    </section>
                    <p><?= nl2br(htmlspecialchars(substr($post->content, 0, 200))) ?>...</p>
                    <cite>— <?= $post->creator?></cite> 
                </article>
            </a>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No tienes posts.</p>
    <?php endif; ?>
</div>
