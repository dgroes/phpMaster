<form action="<?= base_url ?>post/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pos->id; ?>">
    <input type="text" name="title" placeholder="Titulo" aria-label="Text" value="<?= $pos->title; ?>">
    <input type="text" name="sub_title" placeholder="Sub Titulo" aria-label="Text" value="<?= $pos->sub_title; ?>">
    <textarea name="content" placeholder="Write a professional short bio..." aria-label="Professional short bio"><?= $pos->content; ?></textarea>

    <?php $categories = Utils::showAllCategories(); ?>
    <select name="category_id" aria-label="Select your favorite cuisine..." required>
        <?php while ($cat = $categories->fetch_object()) : ?>
            <option value="<?= $cat->id ?>" <?= $cat->id == $pos->category_id ? 'selected' : ''; ?>>
                <?= $cat->name ?>
            </option>
        <?php endwhile; ?>
    </select>
    <?php if ($pos->image != null) : ?>
        <img class="post_image" src="<?= base_url ?>uploads/images/<?= $pos->image ?>" alt="">
    <?php endif; ?>
    <input type="file" name="image">
    <input type="submit" value="Editar">
</form>