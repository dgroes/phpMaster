<div class="private_perfil_title">
    <h2 class="title-category"> <?= $_SESSION['identity']->username ?></h2>
    <a href="<?= base_url ?>user/edit">
        <button class="edition_perfil_button">Editar Perfil</button>
    </a>
</div>

<section class="section_biography">
    <p class="biography">
        <?= nl2br(htmlspecialchars($user->bio)) ?>
    </p>
</section>

<br>
<h2 class="title-category">Post Publicados</h2>

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