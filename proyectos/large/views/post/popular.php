<article class="inicio">
    <h2>Title of a longer featured blog post</h2>
    <p>
        Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.
        <br>
        Continue reading...
    </p>
</article>

<article class="top">
    <section class="top_left">
        <p>World</p>
        <h6>Featured post</h6>
        <p>Nov 12</p> <br>
        <p>
            This is a wider card with supporting text below as a natural lead-in to additional content.
        </p>
        <cite>— Steve Jobs</cite> <br>
        <a href="">Continue reading</a>
    </section>
    <section class="midle">

    </section>

    <section class="top_right" style="background-color: #E5E0F4;">
        <p>Design</p>
        <h6>Post title</h6>
        <p>Nov 7</p> <br>
        <p>
            This is a wider card with supporting text below as a natural lead-in to additional content...
        </p>
        <cite>— Steve Jobs</cite> <br>
        <a href="">Continue reading</a>

    </section>

</article>

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
    </div>